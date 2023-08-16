<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Disease;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\DataTables\DiseasesDataTable;
use File;
use View;
use Redirect;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DiseasesDataTable $dataTable)
    {
        //
        // if(auth()->user()->role != "admin"){
        //     return redirect()->back();
        // }
        // session()->put('cur_tab', 'diseases');
        // return $dataTable->render('disease.index');
        $disease = Disease::OrderBy('id','desc')->where('deleted_at',null)->get();
        return response()->json(['data'=>$disease]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View::make('disease.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        //  $rules = [
        //     'disease_name' => 'required|max:60',
        //     'disease_desc' => 'required|unique:diseases',
        // ];
        // $validator = Validator::make($input, $rules);
       
        // if($validator->passes())
        // {
         $disease = Disease::create($input);

        $newDisease = Disease::where('id', $disease->id)
        ->select('id','disease_name', 'disease_desc')
        ->first();
        
        return response()->json($newDisease);

        // return Redirect::route('disease.index')->with('success','New adopter was added ');
        // }
        // return redirect()->back()->withInput()->withErrors($validator);
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
          // $animals = DB::table('animals')
          //             ->join('animal_disease', 'animal_disease.animal_id', 'animals.id')
          //             ->join('categories', 'categories.id', 'animals.category_id')
          //             ->select('animals.*', 'animal_disease.disease_id', 'category_name')
          //             ->where('animal_disease.disease_id','=',$id)->get()->toArray();
  
          // $diseases = DB::table('diseases')->where('id',"=",$id)->get()->toArray();

         $disease = Disease::with('animals')->where('id', $id)->first();
         return response()->json($disease);
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
        // $diseases = Disease::where('id',"=",$id)
        //             ->first();
        
        // return View::make('disease.edit', compact('diseases'));
         $disease = Disease::where('id', $id)->first();
        return response()->json($disease);
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
        //
         $input = $request->all();
//          $rules = [
//             'disease_name' => 'required|max:60',
//             'disease_desc' => 'required|unique:diseases',
//         ];

// $validator = Validator::make($request->all(), $rules);

// if($validator->passes())
// {
        $disease = Disease::find($id);
        $disease->update($input);
// }
// else
// {
        $disease = Disease::where('id', $id)->first();
        return response()->json($disease);
     // return redirect()->back()->withInput()->withErrors($validator);
// }
//      return Redirect::route('disease.show',$id)->with('success', 'Disease is Updated Successfully');
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
       $disease = Disease::findOrFail($id);
       $disease->delete();
       return response()->json(['status'=>200]);
    }

    public function restore($id)
    {
        Disease::withTrashed()->where('id', $id)->restore();
        return Redirect::route('disease.index')->with('success', 'The disease is restored !!!');
    }
}
