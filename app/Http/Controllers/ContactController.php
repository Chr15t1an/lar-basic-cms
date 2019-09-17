<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
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



         $validator = Validator::make($request->all(), [
             'firstname' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
             'lastname' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
             'email' => 'required|email',
             'msg' => 'required|regex:/^[a-zA-Z0-9\s]*$/',
         ]);


        if ($validator->fails()) {
              // Need to return errors.
                 return response()->json(['errors'=>$validator->errors()]);
              }
        //Store
        $newContact = new Contact;
        $newContact->first_name = $request->firstname;
        $newContact->last_name = $request->lastname;
        $newContact->email = $request->email;
        $newContact->msg = $request->msg;
        $newContact->read = 0; //Unread
        $newContact->archived = 0; //Unarchived.

        try {
          $newContact->save();
          return 'Message Saved';
        } catch (\Exception $e) {
          return response()->json(['errors'=>$e]);
        }

    }



    /**
     * Read the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
      $email = Contact::find($id);
      if ($email->read === 0) {
          $email->read = 1;
      }else {
          $email->read = 0;
      }
      $email->save();
      return $email->read;
      // return view('admin.reademails')->with('email',$email);
    }

    public function archive($id)
    {
      $email = Contact::find($id);

      if ($email->archived === 0) {
          $email->archived = 1;
      }else {
          $email->archived = 0;
      }
      $email->save();

      return $email->archived;
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $email = Contact::find($id);
      return $email;
      // return view('admin.reademails')->with('email',$email);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
