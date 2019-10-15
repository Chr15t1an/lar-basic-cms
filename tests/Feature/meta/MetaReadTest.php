<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MetaReadTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * Test that metadata can be read.
     *
     * @return void
     * @test
     */
    public function test_read_meta()
    {
      $attributes = [
        'meta_key' => $this->faker->word,
        'meta_value' => $this->faker->word,
      ];
        $this->json('POST','api/meta/add',$attributes);
        $this->assertDatabaseHas('metavalues',$attributes);

        $response = $this->json('POST','api/meta/get',[
                'meta_key' => $attributes['meta_key'],
            ]);

        $response->assertSee($attributes['meta_value']);
    }
}
