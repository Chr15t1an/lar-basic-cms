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
        $posts = post::all();
        //Unset All Drafts.
        foreach ($posts as $key => $value) {
          if($value->status === 0){
            unset($posts[$key]);
          }
        }

        return view('posts.index')->with('posts', $posts);
    }

    public function api_index()
    {
        //
        $posts = post::all();

        // foreach ($posts as $key => $value) {
        //   if($value->status === 0){
        //     unset($posts[$key]);
        //   }
        // }

        return $posts;
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


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
                  // 'body' => 'string',
                  // 'meta_value' => 'required',
                  // 'featured_image' => $this->faker->word,
                  'template' => 'required',
                  // 'meta_title' => 'required',
                  // 'meta_description' => $this->faker->sentence,
                  'status' => 'required',
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

                $newPost->status = $request->status;

                // if ($request->status) {
                //   $newPost->status = $request->status;
                // }else {
                //   $newPost->status = 'draft';
                // }

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
                return response()->json(['msg'=>'Post Created.','id'=>$newPost->id]);

              } catch (\Exception $e) {
                //Log Errors
                return response()->json(['errors'=>'failed']);
              }
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
      // $post = post::find($slug);
      $post = post::where('slug', $slug)->first();//find($slug);

      // dd($post);

      if ($post && $post->status===1 ) {
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
        // return gettype($id);
        $id = (int)$id;
        $post = post::findOrFail($id);
        // dd($post);
        return $post;
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

        $validator = Validator::make($request->all(), [
            'slug' => 'required|max:100|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'title' => 'required|string',
            // 'body' => 'string',
            // 'meta_value' => 'required',
            // 'featured_image' => $this->faker->word,
            'template' => 'required',
            // 'meta_title' => 'required',
            // 'meta_description' => $this->faker->sentence,
            'status' => 'required',
        ]);


        if ($validator->fails()) {
              // Need to return errors.
                 return response()->json(['errors'=>$validator->errors()]);
              }


         try {

           $post = post::findOrFail($id);

           // Check for meta key
           // If exist kick back error
           // Addmeta key & Value
           $newPost = $post;

           $newPost->title = $request->title;
           $newPost->template = $request->template;
           $newPost->slug = $request->slug;


            $newPost->status = $request->status;
           // if ($request->status) {
           //   $newPost->status = $request->status;
           // }else {
           //   $newPost->status = 'draft';
           // }

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
     * Remove the specified resource from storage.
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
