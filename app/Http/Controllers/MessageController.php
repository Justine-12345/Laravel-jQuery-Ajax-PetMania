<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ContactController;
use App\DataTables\MessagesDataTable;
use Redirect;
use DB;
use Session;
class MessageController extends Controller
{
   public $emailReciever;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MessagesDataTable $dataTable)
    {
        //
        if(auth()->user()->role != "admin"){
            return redirect()->back();
        }
        session()->put('cur_tab', 'messages');
        return $dataTable->render('message.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('message.create');
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
       $rules = [
            'message_subject' => 'required',
            'message_fname' => 'required',
            'message_lname' => 'required',
            'message_contact' => 'nullable|numeric',
            'message_email' => 'nullable|email',
            'message_content' => 'required|profanity',
        ];

         $validator = Validator::make($request->all(), $rules);

          if($validator->passes()){

           $message = new Message;
           $message = Message::create($request->all());

           $subject = $request->message_subject;
           $fname = $request->message_fname;
           $lname = $request->message_lname;
           $cont = $request->message_contact;
           $this->emailReciever = $request->message_email;
           $content = $request->message_content;

        \Mail::send('mailToAdmin', ['subject' =>  $subject, 'fname' => $fname, 'lname' => $lname, 'cont' => $cont, 'mail' => $this->emailReciever, 'content' => $content], function($message)
        {   
        $message->from($this->emailReciever, 'Petmania');
        $message->to('petmania@example.com','Petmania')->subject('Message From Customer');
        });

            return Redirect::route('message.create')->with('success', 'Message sent successfully !!!');
          }
            return redirect()->back()->withInput()->withErrors($validator);
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
         if(auth()->user()->role != "admin"){
            return redirect()->back();
        }
        $messages = Message::where('messages.id','=',$id)->first();
        return view('message.show', compact('messages'));
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
         if(auth()->user()->role != "admin"){
            return redirect()->back();
        }
        $message = Message::findOrFail($id);
       $message->delete();
        return Redirect::route('message.index')->with('success', 'The Account is deleted  !!!');
    }
}
