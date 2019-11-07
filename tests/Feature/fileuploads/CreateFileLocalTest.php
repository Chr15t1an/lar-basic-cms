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


      $this->assertDatabaseHas('files',['path'=>$response->getContent()]);

      //Need to delete file!!
      // dd($response->getContent());
      $path = $response->getContent();
      
      Storage::disk('assets')->delete($response->getContent());


    }
}
