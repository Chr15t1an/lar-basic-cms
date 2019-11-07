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

      $files = File::all();
      return view('admin.filesindex')->with('files', $files);

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
    public function store(Request $request)
    {



      try {
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







      // try {
      //
      // } catch (\Exception $e) {
      //
      // }

      // dd($request->file('file'));



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
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

// dd($id);

      // $a = '/public/assets/uploads/Pu17DkjdSy9tVCKjBpa3B0xcQ6XVYezgiXoEBLhn.jpeg';
// /uploads/Pu17DkjdSy9tVCKjBpa3B0xcQ6XVYezgiXoEBLhn.jpeg
      Storage::disk('assets')->delete('/uploads/Pu17DkjdSy9tVCKjBpa3B0xcQ6XVYezgiXoEBLhn.jpeg');

      // $id = 2;
      // dd($id);
      // try {
      //   // Delete the model
      //   $a = $responce = File::findOrFail($id);
      //   $a->delete();
      //   return response()->json(['msg'=>'Deleted']);
      // } catch (\Exception $e) {
      //     return response()->json(['errors'=>$e]);
      // }
    }
}
