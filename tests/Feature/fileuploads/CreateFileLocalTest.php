<?php

namespace Tests\Feature;

use Tests\TestCase;

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

      $response = $this->json('POST', 'api/admin/photos', [
          UploadedFile::fake()->image('photo1.jpg'),
          UploadedFile::fake()->image('photo2.jpg')
      ]);



      //Assert file is available in db & public path.
        // $response = $this->get('/fileuploads');
        $response->assertStatus(200);

        // Assert one or more files were stored...
       Storage::disk('photos')->assertExists('photo1.jpg');
       Storage::disk('photos')->assertExists(['photo1.jpg', 'photo2.jpg']);

       // Assert one or more files were not stored...
       Storage::disk('photos')->assertMissing('missing.jpg');
       Storage::disk('photos')->assertMissing(['missing.jpg', 'non-existing.jpg']);




    }
}
