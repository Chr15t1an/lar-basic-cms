<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;



class UpdateTagTest extends TestCase
{
    use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateTag()
    {
      $attributes = [
        'name' => $this->faker->word,
      ];

      $attributes2 = [
        'name' => $this->faker->word,
      ];


        $this->json('POST','api/tag/create',$attributes);
        $this->assertDatabaseHas('tags',$attributes);

        $path = 'api/tag/edit/'.$attributes['name'];

        $this->json('POST',$path,$attributes2);

        $this->assertDatabaseHas('tags',$attributes2);



    }
}
