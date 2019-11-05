<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;


use App\Post;

class DeletePostTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * Test creating and then deleting a post.
     *
     * @return void
     */
    public function testDeletePost()
    {

      //Make one for the test.
      $attributes = [
        'title' => $this->faker->word,
        'body' => $this->faker->sentence,
        'featured_image' => $this->faker->word,
        'template' => $this->faker->word,
        'meta_title' => $this->faker->word,
        'meta_description' => $this->faker->sentence,
        'slug' => $this->faker->word,
        'status' => true,
      ];
        $this->json('POST','api/admin/posts/store',$attributes);
        $this->assertDatabaseHas('posts',$attributes);

        $slug = $attributes['slug'];

        $post = post::where('slug', $slug)->first();
        $postID = $post->id;

        $this->json('post','api/admin/posts/delete/'.$postID);

        $this->assertSoftDeleted('posts', $attributes);

    }
}
