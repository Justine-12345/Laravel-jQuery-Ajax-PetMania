<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Redirect;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
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
        date_default_timezone_set('Asia/Manila');
            $input = $request->all();

        //  $rules = [
        //     'comment_name' => 'required|profanity|max:255',
        //     'comment_content' => 'required|max:255',
        // ];

        // $validator = Validator::make($input, $rules);
        // if($validator->passes())
        // {
         $input['comment_content']= app('profanityFilter')->filter($request->comment_content);
        $input['comment_name']= app('profanityFilter')->filter($request->comment_name);

         if($request->comment_name == null && $request->comment_name == ""){
            $input['comment_name'] = "Unknown guest";
         }

         // if(Auth::check()){
         //    $input['user_id'] = auth()->user()->id;
         // }    

        $comment = Comment::create($input);

        $newComment = Comment::find($comment->id);
        return response()->json($newComment);
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
    }
}
