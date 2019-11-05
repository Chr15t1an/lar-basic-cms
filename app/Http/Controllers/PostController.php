<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * List the published posts yo the public.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        //Unset All Drafts.
        foreach ($posts as $key => $value) {
          if($value->status === 0){
            unset($posts[$key]);
          }
        }
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * List all posts to the admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function api_index()
    {
        $posts = post::all();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              //Validate the Request
              $validator = Validator::make($request->all(), [
                  'slug' => 'required|max:100|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                  'title' => 'required|string',
                  'template' => 'required',
                  'status' => 'required',
              ]);

              if ($validator->fails()) {
              // Return if their are validation errors.
              return response()->json(['errors'=>$validator->errors()]);
              }


              try {
              // Create a New Post
                $newPost = new Post;
                $newPost->title = $request->title;
                $newPost->template = $request->template;
                $newPost->slug = $request->slug;
                $newPost->status = $request->status;
                if ($request->body) {
                  $newPost->body = $request->body;
                }
                if ($request->featured_image) {
                  $newPost->featured_image = $request->featured_image;
                }
                if ($request->meta_title) {
                  $newPost->meta_title = $request->meta_title;
                }
                if ($request->meta_description) {
                  $newPost->meta_description = $request->meta_description;
                }
                $newPost->save();
                return response()->json(['msg'=>'Post Created.','id'=>$newPost->id]);

              } catch (\Exception $e) {
                //Return Errors
                return response()->json(['errors'=>'failed']);
              }
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      //Lookup by slug.
      $post = post::where('slug', $slug)->first();//find($slug);
      //If Post is not published return a 404 status.
      if ($post && $post->status===1 ) {
        return view('posts.default')->with('post', $post);
      }else {
         abort(404);
      }

    }

    /**
     * return the data for the requested post. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return gettype($id);
        $id = (int)$id;
        $post = post::findOrFail($id);
        // dd($post);
        return $post;
    }

    /**
     * Update the post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'slug' => 'required|max:100|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'title' => 'required|string',
            'template' => 'required',
            'status' => 'required',
        ]);


        if ($validator->fails()) {
              // Need to return errors.
                 return response()->json(['errors'=>$validator->errors()]);
              }


         try {
           // Find the post by id.
           // Update the post.
           $post = post::findOrFail($id);
           $newPost = $post;
           $newPost->title = $request->title;
           $newPost->template = $request->template;
           $newPost->slug = $request->slug;
           $newPost->status = $request->status;
           if ($request->body) {
             $newPost->body = $request->body;
           }
           if ($request->featured_image) {
             $newPost->featured_image = $request->featured_image;
           }

           if ($request->meta_title) {
             $newPost->meta_title = $request->meta_title;
           }

           if ($request->meta_description) {
             $newPost->meta_description = $request->meta_description;
           }

           $newPost->save();
           return response()->json(['msg'=>'Post Created.']);

         } catch (\Exception $e) {
           //Log Errors
           return response()->json(['errors'=>'failed']);
         }
    }
    /**
     * Soft Delete The Post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        // Update the model
        $a = $responce = post::findOrFail($id);
        $a->delete();
        return response()->json(['msg'=>'Deleted']);
      } catch (\Exception $e) {
          return response()->json(['errors'=>$e]);
      }
    }
}
