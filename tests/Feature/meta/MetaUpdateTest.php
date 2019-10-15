<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MetaUpdateTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * Test that metadata can be updated.
     *
     * @return void
     * @test
     */
    public function test_read_meta()
    {
      // Create key & Values
      $attributes = [ // sentence
        'meta_key' => $this->faker->word,
        'meta_value' => $this->faker->word,
      ];
      $updatedVal = $this->faker->word;
      //Add to database
        $this->json('POST','api/meta/add',$attributes);
      // Check that it exists
        $this->assertDatabaseHas('metavalues',$attributes);
        $response = $this->json('POST','api/meta/get',[
                'meta_key' => $attributes['meta_key'],
            ]);
        $response->assertSee($attributes['meta_value']);
        //Update it
        $this->json('POST','api/meta/update',[
                    'meta_key' => $attributes['meta_key'],
                    'meta_value' => $updatedVal,
                ]);
        //Check that it was updated.
          $response = $this->json('POST','api/meta/get',[
                        'meta_key' => $attributes['meta_key'],
            ]);

          $response->assertSee($updatedVal);

    }
}
