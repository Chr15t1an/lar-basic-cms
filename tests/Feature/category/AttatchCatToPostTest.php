<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Category;
use App\Post;
use App\Http\Controllers\CategoryController;


class AttatchCatToPostTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAttatchCatToPost()
    {

//Assert Posts 
      //Create Post
      $attributes = [
        'title' => $this->faker->word,
        'body' => $this->faker->sentence,
        'featured_image' => $this->faker->word,
        'template' => $this->faker->word,
        'meta_title' => $this->faker->word,
        'meta_description' => $this->faker->sentence,
        'slug' => $this->faker->word,
        'status' => false,
      ];
        $this->json('POST','api/admin/posts/store',$attributes);
        $this->assertDatabaseHas('posts',$attributes);

        // Create Category
        $attributes2 = [
          'name' => $this->faker->word,
        ];

        $this->json('POST','api/categories/create',$attributes2);
        $this->assertDatabaseHas('categories',$attributes2);

        //Get Cat ID.
        $category = CategoryController::show($attributes2['name']);

        // Add it to the post payload.
        $attributes['category'] = $category->id;

        $slug = $attributes['slug'];

        $post = post::where('slug', $slug)->first();
        $postID = $post->id;

        $this->json('POST','api/admin/posts/edit/'.$postID, $attributes);

        $post = post::where('slug', $slug)->first();

        $this->assertEquals($attributes2['name'], $post->category->name);

    }
}
