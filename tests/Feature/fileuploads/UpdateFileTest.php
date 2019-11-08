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

      //Submit image as an upload.
      $response = $this->json('POST', 'api/file/store',$attributes);
      $response->assertStatus(200);
      $path = $response->getContent();

      //Assert that the file path exists in DB.
      $this->assertDatabaseHas('files',['path'=>$path]);

      // Check That the file exists
      $chunks = explode('/', $path);

      // Assert the file was stored...
      Storage::disk('assets')->assertExists('/uploads/'.$chunks[3]);

      //Assert in DB.
      $this->assertDatabaseHas('files',['path'=>$path]);

      //Pull the record to get the file id.
      $file = File::where('path', $path)->first();

      // Endpoint to get the resource
      $response = $this->json('get', 'api/file/edit/'.$file->id);
      $fileJson = $response->getContent();
      $fileJson = json_decode($fileJson);

      //Update a property.
      $fileJson->title = $this->faker->word;
      $newTitle = $fileJson->title;

      //Set object to array.
      $filearray = (array) $fileJson;

      // Endpoint to update the resource
      $response = $this->json('POST', 'api/file/edit/'.$file->id, $filearray);

      // Assert that the updated title is in the database.
      $this->assertDatabaseHas('files',['title'=>$newTitle]);

      // Clean up the generated file .
      Storage::disk('assets')->delete('/uploads/'.$chunks[3]);
    }
}
