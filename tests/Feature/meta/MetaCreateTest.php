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
     * Test that meta data can be created.
     *
     * @return void
     * @test
     */
    public function test_create_meta()
    {
      $attributes = [
        'meta_key' => $this->faker->word,
        'meta_value' => $this->faker->word,
      ];
        $this->json('POST','api/meta/add',$attributes);
        $this->assertDatabaseHas('metavalues',$attributes);
    }
}
