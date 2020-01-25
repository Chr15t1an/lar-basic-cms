<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;

use App\Category;
use App\Tag;

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




                if ($request->category) {
                  $category = Category::findOrFail($request->categoryId);
                  if($category) {
                    $newPost->category()->associate($category);
                  }
                }



                // if ($request->tag) {
                //
                //   $tagId = intval($request->tag);
                //
                //   $tag = Tag::findOrFail($tagId);
                //
                //
                //   if($tag) {
                //                       // dd($tag);
                //     $newPost->tag()->attach($tag->id);
                //   }
                // }


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
        //Get the relationships.
        $post->tag;

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

           // dd($request->category);
             if ($request->category) {
               $category = Category::findOrFail($request->category);
                   if($category) {
                       $newPost->category()->associate($category);
                   }
             }


             // Issue Tags when attached will create mutliple records.
             // Clear all tags first then add then attach
             // two tags

             // dd($request->tag);

             if (isset($request->tag)) {
               $newPost->tag()->detach();
               $tagIds = explode(",",$request->tag);
               foreach ($tagIds as $id) {
                 $tagId = intval($id);
                 if ($tagId) {
                   // dd($tagId);
                   $newPost->tag()->attach($tagId);
                 }
               }



               // dd($tagId);
               // $tag = Tag::findOrFail($tagId);


               // if($tagId) {
               //   $newPost->tag()->detach();
               //   //This is where you will loop them.
               //   $newPost->tag()->attach($tagId);
               // }
             }



           $newPost->save();
           return response()->json(['msg'=>'Post Updated.']);

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



    /**
      * Create a CSV
      *
      * @param array $columnNames
      * @param array $rows
      * @param string $fileName
      * @return \Symfony\Component\HttpFoundation\StreamedResponse
      */
     public static function getCsv($columnNames, $rows, $fileName = 'file.csv') {
         $headers = [
             "Content-type" => "text/csv",
             "Content-Disposition" => "attachment; filename=" . $fileName,
             "Pragma" => "no-cache",
             "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
             "Expires" => "0"
         ];
         $callback = function() use ($columnNames, $rows ) {
             $file = fopen('php://output', 'w');
             fputcsv($file, $columnNames);
             foreach ($rows as $row) {
                 fputcsv($file, $row);
             }
             fclose($file);
         };
         return response()->stream($callback, 200, $headers);
     }





    public function exportposts() {
        $rows = [];
        $posts = Post::all();
        foreach ($posts as $l) {
          array_push($rows,[$l->title, $l->body,$l->featured_image,$l->meta_title,$l->meta_description,$l->slug,$l->status]);
        }
        $columnNames = ['title', 'body', 'featured_image','meta_title','meta_description','slug','status'];
        return self::getCsv($columnNames, $rows);
    }



}
