<?php

namespace App\Http\Controllers;

use App\Metavalue;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class MetavalueController extends Controller
{
    public function add_metadata(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
          'meta_value' => 'required',
      ]);

     if ($validator->fails()) {
           // Need to return errors.
              return response()->json(['errors'=>$validator->errors()]);
           }


      try {
        // Check for meta key
        // If exist kick back error
        // Addmeta key & Value
        $newLead = new Metavalue;
        $newLead->meta_key = $request->meta_key;
        $newLead->meta_value = $request->meta_value;
        $newLead->save();
        return response()->json(['msg'=>'Key Added Sucessfully.']);

      } catch (\Exception $e) {
        //Log Errors
        return response()->json(['errors'=>'failed']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Metavalue  $metavalue
     * @return \Illuminate\Http\Response
     */

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


    public static function get_metadata($meta_key = '')
    {
          try {
              $responce = Metavalue::where('meta_key', $meta_key)->first();
              return $responce->meta_value;
          } catch (\Exception $e) {
             return NULL;
          }

          return 'true';
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

        $validator = Validator::make($request->all(), [
            'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
            'meta_value' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
        ]);


       if ($validator->fails()) {
             // Need to return errors.
                return response()->json(['errors'=>$validator->errors()]);
             }

             try {
               $a = self::get_metadata($meta_key);
               $a->meta_value = $request->meta_value;
               $a->save();

                return response()->json(['msg'=>'Sucess']);
             } catch (\Exception $e) {
                 return response()->json(['errors'=>$validator->errors()]);
             }
    }

    public function api_update(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
            'meta_value' => 'required',
        ]);


       if ($validator->fails()) {
             // Need to return errors.
                return response()->json(['errors'=>$validator->errors()]);
             }
             try {
               // Update the model
               $meta_key = $request->meta_key;
               $a = $responce = Metavalue::where('meta_key', $meta_key)->first();
               $a->meta_value = $request->meta_value;
               $a->save();
                return response()->json(['msg'=>'Success']);
             } catch (\Exception $e) {
                 return response()->json(['errors'=>$validator->errors()]);
             }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      try {
        // Update the model
        $meta_key = $request->meta_key;
        $a = $responce = Metavalue::where('meta_key', $meta_key)->first();
        $a->delete();
         return response()->json(['msg'=>'Deleted']);
      } catch (\Exception $e) {
          return response()->json(['errors'=>$e]);
      }

    }





}
