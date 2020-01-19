<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Tag;

class DeleteTagTest extends TestCase
{
    use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteTag()
    {

      $attributes = [
        'name' => $this->faker->word,
      ];


        $this->json('POST','api/categories/create',$attributes);
        $this->assertDatabaseHas('categories',$attributes);

        // $cat = Category::where('name', $attributes['name'])->first();

         // dd(gettype($cat->id));
        // $id=strval( $cat->id );
       // dd($attributes['name']);

        $this->json('POST','api/categories/delete/'.$attributes['name']);

        $this->assertDatabaseMissing('categories', $attributes);
    }
}
