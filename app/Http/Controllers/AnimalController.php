<?php
namespace App\Http\Controllers;
use App\Models\Veterinarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;
use App\Models\Category;
use App\Models\Disease;
use App\Models\Rescuer;
use App\Models\Adopter;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use File;
use View;
use Redirect;
use App\DataTables\AnimalsDataTable;
use App\Events\NewAnimalRescue;
use App\Imports\AnimalsImport;
use App\Rules\Import;
use Excel;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AnimalsDataTable $dataTable)
    {
       //
        //  $animals = DB::table('animals')
        //  ->join('categories','animals.category_id', 'categories.id')->select('animals.*', 'categories.category_name')->orderBy('animals.id', 'DESC')->paginate(10);
        // return View::make('animal.index', compact('animals'));

        
        // if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        // }
        // session()->put('cur_tab', 'animals');
        // return $dataTable->render('animal.index');

        $animals = DB::table('animals')
         ->join('categories','categories.id', 'animals.category_id')
         ->select('animals.id as animal_id', 'animal_name','category_name', 'animal_gender','animal_age', 'animal_breed', 'animal_health')
         ->where('animals.deleted_at',null)
         ->get();
        return response()->json(['data'=>$animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::select()->pluck('category_name','id');
        $diseases = Disease::select()->pluck('disease_name','id');
        $rescuers = Rescuer::with('users')->select()->pluck('rescuer_lname','id');
        $veterinarians = Veterinarian::with('users')->select()->pluck('veterinarian_lname','id');

       return response()->json(['categories'=>$categories, 'diseases'=>$diseases, 'rescuers'=>$rescuers, 'veterinarians'=>$veterinarians]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    


       $input = $request->all();
    
                // if($request->hasFile('animal_pic'))
                // {
                //     $animal_image = $request->file('animal_pic')->getClientOriginalName();
                //     $t=time();
                //     $request->file('animal_pic')->storeAs('public/images', $t."-".$animal_image);
                //     $input['animal_picture'] = 'storage/images/'. $t."-".$animal_image;
                // }



        if(@count($input['disease_id']) <= 0){
          $request->request->add(['animal_health' => "Healthy"]);
        }
        if (@count($input['disease_id']) == 1 || @count($input['disease_id']) == 2) {
           $request->request->add(['animal_health' => "Bad"]);
        }
         if (@count($input['disease_id']) == 3 || @count($input['disease_id']) == 4) {
           $request->request->add(['animal_health' => "Worst"]);
        }
         if (@count($input['disease_id']) == 5 || @count($input['disease_id']) == 6) {
           $request->request->add(['animal_health' => "Severe"]);
        }

        if(!is_numeric($input['category_id'])){
            $newCategory = new Category;
            $newCategory->category_name = $request->category_id;
            $newCategory->save();
            $input['category_id'] = $newCategory->id;
        }
       

         $animal = new Animal;
                $animal->animal_name = $request->animal_name;
                $animal->animal_gender = $request->animal_gender;
                $animal->animal_age = $request->animal_age;
                $animal->animal_breed = $request->animal_breed;
                $animal->animal_health = $request->animal_health;
                $animal->category_id = $input['category_id'];
                $files = $request->file('animal_pic');
                $animal->animal_picture = '/storage/images/'.$files->getClientOriginalName();
                
                $data=array('status' => 'saved');
                Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));


         // $animal = Animal::create($input);
         $animal->save();
         $animal->category()->associate($animal);

         if ($request->rescuer_id) {
              $animal->rescuers()->attach($request->rescuer_id);
         }else{
            $rescuer = new Rescuer;
            $rescuer->rescuer_fname = $request->a_rescuer_fname;
            $rescuer->rescuer_lname = $request->a_rescuer_lname;
            $rescuer->rescuer_age = $request->a_rescuer_age;
            $rescuer->rescuer_contact = $request->a_rescuer_contact;
            $rescuer->rescuer_address = $request->a_rescuer_address;
            $rescuer->rescuer_gender = $request->a_rescuer_gender;
            $rescuer->is_Add = 1;
            $rescuer->save();
            $animal->rescuers()->attach($rescuer->id);
         }


         if ($request->veterinarian_id) {
            $animal->veterenarians()->attach($request->veterinarian_id);
         }else{
            $veterinarian = new Veterinarian;
            $veterinarian->veterinarian_fname = $request->a_veterinarian_fname;
            $veterinarian->veterinarian_lname = $request->a_veterinarian_lname;
            $veterinarian->veterinarian_age = $request->a_veterinarian_age;
            $veterinarian->veterinarian_contact = $request->a_veterinarian_contact;
            $veterinarian->veterinarian_address = $request->a_veterinarian_address;
            $veterinarian->veterinarian_gender = $request->a_veterinarian_gender;
            $veterinarian->is_Add = 1;
            $veterinarian->save();
            $animal->veterenarians()->attach($veterinarian->id);
         }




         foreach ($request->disease_id as $key) {
              $animal->diseases()->attach($key);
         }
        
        // For Mail
        //  $find_category = Animal::with('category')
        //  ->where('id', $animal->id)->first();
        
        //  $animal_disease_name = "";
        // if(@count($input['disease_id']) > 1){
           
        //     foreach ($input['disease_id'] as $disease_id) {
        //         $disease = Disease::where('id', $disease_id)->first();
        //         $animal_disease_name .= " (".$disease->disease_name.") ";
        //     }

        // }
        // else{
        //      $disease = Disease::where('id',$input['disease_id']['0'])->first();
        //      $animal_disease_name .= " (".$disease->disease_name.") ";
        // }
        // $find_vet = Veterinarian::where('id', $request->veterinarian_id)->first();
        // $vets = User::where('role','veterinarian')->get();
        // $animall = Animal::with('category')->with('diseases')->where('id',$animal->id)->first();
       
        // foreach ($vets as $vet) {
        //     event(new NewAnimalRescue($vet, $animall));
        // }
         $newAnimal = DB::table('animals')
         ->where('animals.id', $animal->id)
         ->join('categories','categories.id', 'animals.category_id')
         ->select('animals.id as animal_id', 'animal_name','category_name', 'animal_gender','animal_age', 'animal_breed', 'animal_health')
         ->first();
             return response()->json($newAnimal);
        

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $animal = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with('category')
        ->where('animals.id', $id)->first();
        // dd($animal);
        return response()->json($animal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

         $animal = Animal::with(array('diseases' => function($query) {$query->withTrashed();}))
        ->with(array('adopters' => function($query) {$query->withTrashed();}))
        ->with(array('rescuers' => function($query) {$query->withTrashed();}))
        ->with(array('veterenarians' => function($query) {$query->withTrashed();}))
        ->with('category')
        ->where('animals.id', $id)->first();

        $categories = Category::select()->pluck('category_name','id');
        $diseases = Disease::select()->pluck('disease_name','id');
        $rescuers = Rescuer::select()->pluck('rescuer_lname','id');
        $adopters = Adopter::select()->pluck('adopter_lname','id')->toArray();
        $veterinarians = Veterinarian::with('users')->select()->pluck('veterinarian_lname','id');

         return response()->json(['animal'=>$animal, 'categories'=>$categories, 'diseases'=>$diseases, 'adopters'=>$adopters, 'veterinarians'=>$veterinarians, 'rescuers'=>$rescuers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $input = $request->all();
        

    
        // File::delete($input['old_animal_pic']);
        // $animal_image = $request->file('animal_pic')->getClientOriginalName();
        // $t=time();
        // $request->file('animal_pic')->storeAs('public/images', $t."-".$animal_image);
        // $input['animal_picture'] = 'storage/images/'. $t."-".$animal_image;


       if(isset($request->disease_id)){
        if(@count($input['disease_id']) <= 0 ){
           $request->request->add(['animal_health' => "Healthy"]);
        }
        if (@count($input['disease_id']) == 1 || @count($input['disease_id']) == 2) {
            $request->request->add(['animal_health' => "Bad"]); 
        }
         if (@count($input['disease_id']) == 3 || @count($input['disease_id']) == 4) {
           $request->request->add(['animal_health' => "Worst"]);
        }
         if (@count($input['disease_id']) >= 5) {
            $request->request->add(['animal_health' => "Severe"]);
        }
       }
       else{
        $request->request->add(['animal_health' => "Healthy"]);
       }


        $animal = Animal::find($id);
                $animal->animal_name = $request->animal_name;
                $animal->animal_gender = $request->animal_gender;
                $animal->animal_age = $request->animal_age;
                $animal->animal_breed = $request->animal_breed;
                $animal->animal_health = $request->animal_health;
                $animal->category_id = $request->category_id;

                if($request->hasFile('animal_pic'))
                 {
                $files = $request->file('animal_pic');
                $animal->animal_picture = '/storage/images/'.$files->getClientOriginalName();
                $data=array('status' => 'saved');
                Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));
                 }

         $animal->save();

        // $animal = Animal::find($id);
        // $animal->update($input);
        $animal->category()->dissociate();
        $animal->rescuers()->detach();
        $animal->diseases()->detach();
        $animal->adopters()->detach();
        $animal->veterenarians()->detach();
        
        $animal->category()->associate($animal);
        $animal->rescuers()->attach($request->rescuer_id);
        $animal->veterenarians()->attach($request->veterinarian_id);
      
        if($request->adopter_id != "0"){
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');
        $animal->adopters()->attach($request->adopter_id, ['status'=> 1 ,'created_at'=> $date]);
        }

        if(isset($request->disease_id)){
             foreach ($request->disease_id as $key) {
                  $animal->diseases()->attach($key);
             }
        }
       
        // else
        // {
        //     if(isset($request->disease_id)){
        //         if(@count($input['disease_id']) <= 0){
        //           $input['animal_health'] = "Healthy";
        //         }
        //         if (@count($input['disease_id']) == 1 || @count($input['disease_id']) == 2) {
        //            $input['animal_health'] = "Bad";
        //         }
        //          if (@count($input['disease_id']) == 3 || @count($input['disease_id']) == 4) {
        //            $input['animal_health'] = "Worst";
        //         }
        //          if (@count($input['disease_id']) == 5) {
        //            $input['animal_health'] = "Severe";
        //         }
        //     }
        //     else{
        //         $input['animal_health'] = "Healthy";
        //     }
        // $animal = Animal::find($id);
        // $animal->update($input);
        // $animal->category()->dissociate();
        // $animal->rescuers()->detach();
        // $animal->diseases()->detach();
        // $animal->adopters()->detach();
        // $animal->veterenarians()->detach();
        // $animal->category()->associate($animal);
        // $animal->rescuers()->attach($request->rescuer_id);
        // $animal->veterenarians()->attach($request->veterinarian_id);

        // if($request->adopter_id != "0"){
        // date_default_timezone_set('Asia/Manila');
        // $date = date('Y-m-d H:i:s');
        // $animal->adopters()->attach($request->adopter_id, ['created_at'=> $date]);
        // }


        // if(isset($request->disease_id)){
        //      foreach ($request->disease_id as $key) {
        //           $animal->diseases()->attach($key);
        //      }
        // }
        
        // }

         $newAnimal = DB::table('animals')
         ->where('animals.id', $animal->id)
         ->join('categories','categories.id', 'animals.category_id')
         ->select('animals.id as animal_id', 'animal_name','category_name', 'animal_gender','animal_age', 'animal_breed', 'animal_health')
         ->first();
             return response()->json($newAnimal);

         }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $animal = Animal::findOrFail($id);
       $animal->delete();

        return response()->json(['status'=>200]);
    }

    public function restore($id)
    {
        Animal::withTrashed()->where('id', $id)->restore();
        return Redirect::route('animal.index')->with('success', 'The Account is restored !!!');
    }



    public function import(Request $request) {
    
        $request->validate([
        'animal_import' => ['required', new Import($request->file('animal_import'))],
        ]);

        Excel::import(new AnimalsImport, request()->file('animal_import')->store('temp'));
        return redirect()->back()->with('success', 'Successfully done the operation.');
    }




}
