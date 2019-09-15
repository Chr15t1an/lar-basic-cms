<?php

namespace App\Http\Controllers;

use App\Signup;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class SignupController extends Controller
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
             'plan' => 'alpha',
         ]);


        if ($validator->fails()) {
              // Need to return errors.
                 return response()->json(['errors'=>$validator->errors()]);
              }
        //Store
        $newLead = new Signup;
        $newLead->first_name = $request->firstname;
        $newLead->last_name = $request->lastname;
        $newLead->email = $request->email;
        $newLead->plan = $request->plan;

        try {
          $newLead->save();
          return 'Message Saved';
        } catch (\Exception $e) {
          return response()->json(['errors'=>$e]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function show(Signup $signup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function edit(Signup $signup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signup $signup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signup $signup)
    {
        //
    }
}
