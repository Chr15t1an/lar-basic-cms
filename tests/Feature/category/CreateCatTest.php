<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class CreateCatTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateCategory()
    {
      $attributes = [
        'name' => $this->faker->word,
      ];


        $this->json('POST','api/categories/create',$attributes);
        $this->assertDatabaseHas('categories',$attributes);


        //
        //
        // $response = $this->get('/');
        //
        // $response->assertStatus(200);
    }
}
