<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;



class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $files = File::all();
      // return view('admin.filesindex')->with('files', $files);
      return view('admin.filesindex');
    }

    public function api_index()
    {
      $files = File::all();
      return $files;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      try {

        // return $request;
        // dd($request->file('file'));

        if ($request->file('file') === null) {
          return "No File Found";
        }

        //Upload the file
        $path = $request->file('file')->store('uploads', 'assets');
        // Create a New File
        $newFile = new File;
        $newFile->path = '/assets/'.$path;
        $newFile->save();
        return $newFile->path;//response()->json(['msg'=>'sucess']);
      } catch (\Exception $e) {
        //Return Errors
        return response()->json(['errors'=>'failed']);
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Return the object via the api.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $a = $responce = File::findOrFail($id);
      return $a;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        //
        $a = $responce = File::findOrFail($id);
        try {
          //Upload the file
          if ($request->title) {
              $a->title = $request->title;

          }
          // $a->title = $request->title;


          if ($request->path) {
            $a->path = $request->path;

          }

          // $a->path = $request->path;
          // Create a New File
          $a->save();
          return response()->json(['msg'=>'sucess']);
        } catch (\Exception $e) {
          //Return Errors
          return response()->json(['errors'=>'failed']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        // Delete the model
        $a = $responce = File::findOrFail($id);
        $path = $a->path;
        $chunks = explode('/', $path);
        // Delete file
        Storage::disk('assets')->delete('/uploads/'.$chunks[3]);
        // Delete object.
        $a->delete();
        return response()->json(['msg'=>'Deleted']);
      } catch (\Exception $e) {
          return response()->json(['errors'=>$e]);
      }
    }
}
