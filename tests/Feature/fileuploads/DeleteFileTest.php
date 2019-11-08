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

      //Submit image as an upload.
      $response = $this->json('POST', 'api/file/store',$attributes);
      $response->assertStatus(200);

      //Save the path.
      $path = $response->getContent();
      // Assert that the path exists in the database.
      $this->assertDatabaseHas('files',['path'=>$path]);
      //Cunk the path to grab the filename and rebuild the path.
      $chunks = explode('/', $path);
      // Assert the file was stored...
      Storage::disk('assets')->assertExists('/uploads/'.$chunks[3]);

      //Pull the record to get the file id.
      $file = File::where('path', $path)->first();

      // Delet the file using the controller.
      $response = $this->json('POST', '/api/file/delete/'.$file->id);

      // Assert a path does not exist in the database.
      $this->assertDatabaseMissing('files',['path'=>$path]);

      // Assert a file does not exist.
      Storage::disk('assets')->assertMissing('/uploads/'.$chunks[3]);

    }
}
