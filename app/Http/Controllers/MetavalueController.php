<?php

namespace App\Http\Controllers;

use App\Metavalue;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class MetavalueController extends Controller
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
    // public function store(Request $request)
    // {
    //     //
    // }

    public function add_metadata(Request $request)
    // public function add_metadata($meta_key = '', $meta_value, Request $request)
    /// A version of this function should work passing the key and value
    ///Right now just pass them.
    {

      $validator = Validator::make($request->all(), [
          'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
          'meta_value' => 'required',
      ]);


     if ($validator->fails()) {
           // Need to return errors.
              return response()->json(['errors'=>$validator->errors()]);
           }

     // if (isset(self::get_metadata($meta_key))) {
     //             return response()->json(['errors'=>'This Key Is already Set']);
     //       }


        // Check for meta key
        // If exist kick back error
        // Addmeta key & Value
        $newLead = new Metavalue;
        $newLead->meta_key = $request->meta_key;
        $newLead->meta_value = $request->meta_value;
        $newLead->save();


        return response()->json(['msg'=>'Key Added Sucessfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Metavalue  $metavalue
     * @return \Illuminate\Http\Response
     *///Show
    // public function get_metadata($meta_type, $object_id, $meta_key = '', $single = false)
    //https://codex.wordpress.org/Function_Reference/get_metadata

    // public function get_metadata($meta_key = '' )
    // {


    public function api_get_metadata(Request $request )
    {

      $meta_key = $request->meta_key;
      // return $meta_key;
      $validator = Validator::make($request->all(), [
          'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
      ]);
      $meta_key = $request->meta_key;

      return self::get_metadata($meta_key);
    }

    // public function get_metadata( $meta_key = '',Request $request )
    public static function get_metadata($meta_key = '')
    {
      // if ($request) {
      //   // code...
      // }

      // return 'true';
      //

      // $meta_key = $request->meta_key;
      // $validator = Validator::make($request->all(), [
      //     'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
      // ]);

      // $validator = Validator::make($meta_key, [
      //     'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
      // ]);



      // !!!!!Need to validate here aswell

      // if ($validator->fails()) {
      //       // Need to return errors.
      //          return response()->json(['errors'=>$validator->errors()]);
      //       }



          try {
              $responce = Metavalue::where('meta_key', $meta_key)->first();
              // dd($metaValue);
              // return $metaValue->value;
              return $responce->meta_value;

          } catch (\Exception $e) {
             return NULL;
             // return 'Fail  '.$e;
             //Log bug too.

          }


return 'true';



    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Metavalue  $metavalue
     * @return \Illuminate\Http\Response
     */
    public function edit(Metavalue $metavalue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Metavalue  $metavalue
     * @return \Illuminate\Http\Response
     */
    public function update($meta_key, $meta_value, Request $request)
    {
        //

       //  $validator = Validator::make($request->all(), [
       //      'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
       //      'meta_value' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
       //  ]);
       //
       //
       // if ($validator->fails()) {
       //       // Need to return errors.
       //          return response()->json(['errors'=>$validator->errors()]);
       //       }
       //
       //       try {
       //         $a = self::get_metadata($meta_key);
       //         $a->meta_value = $request->meta_value;
       //         $a->save();
       //
       //          return response()->json(['msg'=>'Sucess']);
       //       } catch (\Exception $e) {
       //           return response()->json(['errors'=>$validator->errors()]);
       //
       //       }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metavalue  $metavalue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metavalue $metavalue)
    {
        //
    }
}
