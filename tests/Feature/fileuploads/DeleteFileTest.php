<?php

namespace Tests\Feature;


use App\File;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class DeleteFileTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteFile()
    {
      //Create an Image
      $attributes = [
      'file' => UploadedFile::fake()->image('avatar.jpg'),
      ];
      //
      $response = $this->json('POST', 'api/file/store',$attributes);
      $response->assertStatus(200);
      //

      $path = $response->getContent();
      //
      $this->assertDatabaseHas('files',['path'=>$path]);
      //
      //
      //  // Check That the file exists
      $chunks = explode('/', $path);


        // Assert the file was stored...
      Storage::disk('assets')->assertExists('/uploads/'.$chunks[3]);

      //
      // //Need to delete file!!
      //
      $file = File::where('path', $path)->first();
      //
      // print_r($file->id);
      //
      $response = $this->json('POST', '/api/file/delete/'.$file->id);
      //
      //
      $this->assertDatabaseMissing('files',['path'=>$path]);
      // //Clean Up
      //
      // // $chunks = explode('/', $path);
      // // //Need to delete file!!
      // // // dd($response->getContent());
      // // Storage::disk('assets')->delete('/uploads/'.$chunks[3]);
      //
      //
      // // Assert a file does not exist...
      Storage::disk('assets')->assertMissing('/uploads/'.$chunks[3]);

    }
}
