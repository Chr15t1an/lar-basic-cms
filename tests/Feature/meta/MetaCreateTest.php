<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MetaCreateTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function test_create_meta()
    {
      $attributes = [ // sentence
        'meta_key' => $this->faker->word,
        'meta_value' => $this->faker->word,
      ];


        $this->json('POST','api/meta/add',$attributes);
        $this->assertDatabaseHas('metavalues',$attributes);

    }
}


// Route::post('/meta/add','MetavalueController@add_metadata')->middleware('auth:api');
// Route::post('/meta/get','MetavalueController@api_get_metadata');
// Route::post('/meta/update','MetavalueController@api_update')->middleware('auth:api');
// Route::post('/meta/delete','MetavalueController@destroy')->middleware('auth:api');
