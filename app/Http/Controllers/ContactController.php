<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $validator = Validator::make($request->all(), [
             'first_name' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
             'last_name' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
             'email' => 'required|email',
             'msg' => 'required|regex:/^[a-zA-Z0-9 _.,!"\s]*$/',
         ]);


        if ($validator->fails()) {
              // Need to return errors.
                 return response()->json(['errors'=>$validator->errors()]);
              }
        //Store
        $newContact = new Contact;
        $newContact->first_name = $request->first_name;
        $newContact->last_name = $request->last_name;
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

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $email = Contact::find($id);
        $email->delete();
          return 'ok';
      } catch (\Exception $e) {
        return response()->json(['errors'=>$e]);
      }
    }
}
