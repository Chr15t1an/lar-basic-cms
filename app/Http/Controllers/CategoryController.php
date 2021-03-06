<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

// use App\Post;

use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{



  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  // public function addCategory(Request $request, $postId, $categoryId)
  // {

    // $post = Post::findOrFail($postId);
    // $category = Category::findOrFail($categoryId);
    // $post->account()->associate($category);
    // $post->save();

    // $categories = Category::all();
    // return $categories;
    //
    // associate

  // }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function removeCategory()
  {
    // $categories = Category::all();
    // return $categories;
  }



  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function updateCategory($postID, $categoryslug)
  {
    // self::show($slug);
    // $categories = Category::all();
    // return $categories;
  }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      return $categories;
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

      $newCategory = new Category;
        $newCategory->name = $request->name;

          try {
            $newCategory->save();
            return 'Category Saved';
          } catch (\Exception $e) {
            return response()->json(['errors'=>$e]);
          }


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
    //     $newCategory = new Category;
    //     $newCategory->name = $request->name;
    //
    //     try {
    //       $newCategory->save();
    //       return 'Message Saved';
    //     } catch (\Exception $e) {
    //       return response()->json(['errors'=>$e]);
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($slug)
    {
        ////Lookup by slug.
        $cat = Category::where('name', $slug)->first();
        //If Category is not available return a 404 status.
        if (empty($cat)) {
          abort(404);
        }

        return $cat;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($slug)
    // {
    //   ////Lookup by slug.
    //   $post = Category::where('name', $slug)->first();
    //   //If Post is not published return a 404 status.
    //   if (empty($post)) {
    //     abort(404);
    //   }
    //
    //
    //
    // }

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
      $cat = Category::where('name', $slug)->first();

      // dd($cat);

      //If Post is not published return a 404 status.
      // if (empty($cat)) {
      //   abort(404);
      // }
      $cat->name = $request->name;

      try {
        $cat->save();
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
      $cat = Category::where('name', $slug)->first();
      //If Post is not published return a 404 status.
      if (empty($cat)) {
        abort(404);
      }

      try {
        // Update the model
        // $a = $responce = post::findOrFail($id);
        $cat->delete();
        return response()->json(['msg'=>'Deleted']);
      } catch (\Exception $e) {
          return response()->json(['errors'=>$e]);
      }


    }
}
