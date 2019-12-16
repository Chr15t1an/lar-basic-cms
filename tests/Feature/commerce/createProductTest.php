<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class createProductTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateProduct()
    {
      $attributes = [
        'name' => $this->faker->word,
        'price' => 9.99,
        'type' => $this->faker->word,
        'description' => $this->faker->sentence,
        // 'image' => $this->faker->word,
        'status' => false,
      ];
        $this->json('POST','api/admin/product/store',$attributes);
        $this->assertDatabaseHas('products',$attributes);
    }
}
