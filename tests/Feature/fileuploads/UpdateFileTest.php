<?php

namespace Tests\Feature;

use App\File;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UpdateFileTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
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

      //Assert in DB.
      $this->assertDatabaseHas('files',['path'=>$path]);



      //
      $file = File::where('path', $path)->first();


      // Endpoint to get the resource

      $response = $this->json('get', 'api/file/edit/'.$file->id);
      // dd($response);
      $fileJson = $response->getContent();
      $fileJson = json_decode($fileJson);
      //Update a property.
      $fileJson->title = $this->faker->word;
      $newTitle = $fileJson->title;
      // $fileJson = json_encode($fileJson);

      // dd($fileJson);

      $filearray = (array) $fileJson;


      // Endpoint to update the resource

      $response = $this->json('POST', 'api/file/edit/'.$file->id, $filearray);




      $this->assertDatabaseHas('files',['title'=>$newTitle]);




      //Clean Up
      Storage::disk('assets')->delete('/uploads/'.$chunks[3]);
    }
}
