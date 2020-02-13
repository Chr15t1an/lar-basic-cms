<?php

namespace App\Http\Controllers;

use App\Metavalue;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class MetavalueController extends Controller
{

  /**
   * Add a new metadata key value pair.
   *
   * @param  \App\Metavalue  $metavalue
   * @return \Illuminate\Http\Response
   */

    public function add_metadata(Request $request)
    {

      //Validate the Request
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
        $newLead->public_permission = 0;
        $newLead->save();
        return response()->json(['msg'=>'Key Added Sucessfully.']);

      } catch (\Exception $e) {
        //Log Errors
        return response()->json(['errors'=>'failed']);
      }
    }

    /**
     * Handles the Api Request
     *
     * @param  \App\Metavalue  $metavalue
     * @return \Illuminate\Http\Response
     */

    public function api_get_metadata(Request $request )
    {
      //validate the $request
      $meta_key = $request->meta_key;
      $validator = Validator::make($request->all(), [
          'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
      ]);
      $meta_key = $request->meta_key;

      //call the get_metadata function
      return self::get_metadata($meta_key);
    }



    public function api_get_private_metadata(Request $request )
    {
      //validate the $request
      $meta_key = $request->meta_key;
      $validator = Validator::make($request->all(), [
          'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
      ]);
      $meta_key = $request->meta_key;

      //call the get_metadata function
      try {
          $responce = Metavalue::where('meta_key', $meta_key)->first();
          return $responce->meta_value;
      } catch (\Exception $e) {
         return NULL;
      }
    }


    /**
     * Retrives the metadata by meta_key
     *
     * @param  \App\Metavalue  $metavalue
     * @return \Illuminate\Http\Response
     */

    public static function get_metadata($meta_key = '')
    {
          try {
              $responce = Metavalue::where('meta_key', $meta_key)->where('public_permission', 1)->first();
              return $responce->meta_value;
          } catch (\Exception $e) {
             return NULL;
          }

          return 'true';
    }

    /**
     * Update the meta_value by passing the meta_key & meta_value.
     *
     * @param  \App\Metavalue  $metavalue
     * @return \Illuminate\Http\Response
     */
    public static function update($meta_key, $meta_value)
    {
             try {
               $a = $responce = Metavalue::where('meta_key', $meta_key)->first();
               $a->meta_value = $meta_value;
               $a->save();
                return response()->json(['msg'=>'Sucess']);
             } catch (\Exception $e) {
                 return response()->json(['errors'=>$e]);
             }
    }

    /**
     * Update the meta_value by passing the meta_key & meta_value via the api.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Metavalue  $metavalue
     * @return \Illuminate\Http\Response
     */
    public function api_update(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'meta_key' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
            'meta_value' => 'required',
            // 'public_permission' => 'required',
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

               if (isset($request->public_permission)) {
                 $a->public_permission = $request->public_permission;
               }


               $a->save();
                return response()->json(['msg'=>'Success']);
             } catch (\Exception $e) {
                 return response()->json(['errors'=>$validator->errors()]);
             }
    }


    /**
     * Remove the meta_key & meta_value by passing the meta_key
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
