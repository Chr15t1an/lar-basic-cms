<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CreatePostTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     *  Test creating a post. 
     *
     * @return void
     */
    public function testCreatePost()
      {
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
      }

}
