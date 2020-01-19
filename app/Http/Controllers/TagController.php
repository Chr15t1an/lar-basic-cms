<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

// use App\Post;

use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tags = Tag::all();
      return $tags;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
      ]);

      if ($validator->fails()) {
            // Need to return errors.
           return response()->json(['errors'=>$validator->errors()]);
      }

      $newTag = new Tag;
        $newTag->name = $request->name;

          try {
            $newTag->save();
            return '$newTag Saved';
          } catch (\Exception $e) {
            return response()->json(['errors'=>$e]);
          }


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($slug)
    {
        ////Lookup by slug.
        $tag = Tag::where('name', $slug)->first();
        //If Category is not available return a 404 status.
        if (empty($tag)) {
          abort(404);
        }

        return $tag;


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

      $validator = Validator::make($request->all(), [
          'name' => 'required|max:155|regex:/^[a-zA-Z\s]*$/',
      ]);

      if ($validator->fails()) {
        // Need to return errors.
        return response()->json(['errors'=>$validator->errors()]);
      }


      ////Lookup by slug.
      $tag = Tag::where('name', $slug)->first();


      $tag->name = $request->name;

      try {
        $tag->save();
        return 'Cat Updated';
      } catch (\Exception $e) {
        return response()->json(['errors'=>$e]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
      ////Lookup by slug.
      $tag = Tag::where('name', $slug)->first();
      //If Post is not published return a 404 status.
      if (empty($tag)) {
        abort(404);
      }

      try {
        // Update the model
        // $a = $responce = post::findOrFail($id);
        $tag->delete();
        return response()->json(['msg'=>'Deleted']);
      } catch (\Exception $e) {
          return response()->json(['errors'=>$e]);
      }


    }
}
