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

      $response = $this->json('POST', 'api/file/store',$attributes);
      $response->assertStatus(200);


      $path = $response->getContent();

      //Assert in DB.
      $this->assertDatabaseHas('files',['path'=>$path]);

                //Check that route works
              // $response = $this->get($path);

              // dd($response);
              //
              //
              // $response->assertStatus(200);
              //
              //
              //   dd('$path');


      // Check That the file exists
      $chunks = explode('/', $path);


      // Assert the file was stored...
      Storage::disk('assets')->assertExists('/uploads/'.$chunks[3]);


      //Clean Up
      Storage::disk('assets')->delete('/uploads/'.$chunks[3]);


    }
}
