<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\File;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CreateFileLocalTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * Test Uploading a file
     *
     * @return void
     */
    public function testLocalUpload()
    {
      //Create an Image
      $attributes = [
      'file' => UploadedFile::fake()->image('avatar.jpg'),
      ];

      //Submit image as an upload.
      $response = $this->json('POST', 'api/file/store',$attributes);
      $response->assertStatus(200);
      $path = $response->getContent();

        // Assert that the path exists in the database.
      $this->assertDatabaseHas('files',['path'=>$path]);

      $chunks = explode('/', $path);
      // Assert the file was stored...
      Storage::disk('assets')->assertExists('/uploads/'.$chunks[3]);


      //Clean Up the file. 
      Storage::disk('assets')->delete('/uploads/'.$chunks[3]);


    }
}
