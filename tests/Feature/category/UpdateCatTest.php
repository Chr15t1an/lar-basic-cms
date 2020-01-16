<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;



class UpdateCatTest extends TestCase
{
    use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateCat()
    {
      $attributes = [
        'name' => $this->faker->word,
      ];

      $attributes2 = [
        'name' => $this->faker->word,
      ];


        $this->json('POST','api/categories/create',$attributes);
        $this->assertDatabaseHas('categories',$attributes);


        $this->json('POST','/categories/edit/'+$attributes['name'],$attributes2);

        $this->assertDatabaseHas('categories',$attributes2);



    }
}
