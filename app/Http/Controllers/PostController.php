<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
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
    public function create(Request $request)
    {


        //Validate the Request
        $validator = Validator::make($request->all(), [
            'slug' => 'required|max:100|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'title' => 'required|string',
            // 'body' => 'string',
            // 'meta_value' => 'required',
            // 'featured_image' => $this->faker->word,
            'template' => 'required',
            // 'meta_title' => 'required',
            // 'meta_description' => $this->faker->sentence,
            'status' => 'required|string',
        ]);

       if ($validator->fails()) {
             // Need to return errors.
                return response()->json(['errors'=>$validator->errors()]);
             }


        try {
          // Check for meta key
          // If exist kick back error
          // Addmeta key & Value
          $newPost = new Post;

          $newPost->title = $request->title;
          $newPost->template = $request->template;
          $newPost->slug = $request->slug;

          if ($request->status) {
            $newPost->status = $request->status;
          }else {
            $newPost->status = 'draft';
          }

          if ($request->body) {
            $newPost->body = $request->body;
          }
          // else {
            // $newPost->body => $request->body,
          // }

          if ($request->featured_image) {
            $newPost->featured_image = $request->featured_image;
          }
          // $newPost->featured_image => $request->faker->word,



          if ($request->meta_title) {
            $newPost->meta_title = $request->meta_title;
          }
          // $newPost->meta_title => $request->faker->word,

          if ($request->meta_description) {
            $newPost->meta_description = $request->meta_description;
          }

          // $newPost->meta_description => $request->faker->sentence,


          // $newPost->meta_key = $request->meta_key;
          // $newPost->meta_value = $request->meta_value;
          $newPost->save();
          return response()->json(['msg'=>'Post Created.']);

        } catch (\Exception $e) {
          //Log Errors
          return response()->json(['errors'=>'failed']);
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      //lookup by slug
      $post = post::find($slug);
      if ($post && $post->status==='published' ) {
        return view('posts.default')->with('post', $post);
      }else {
         abort(404);
      }


//       use Illuminate\Support\Facades\View;
//
// if (View::exists('emails.customer')) {
//     //
// }



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
