<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Tag;
use App\Post;
use App\Http\Controllers\TagController;


class AttatchTagToPostTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAttatchTagToPost()
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

        $this->json('POST','api/tag/create',$attributes2);
        $this->assertDatabaseHas('tags',$attributes2);

        //Get $tag ID.
        $tag = TagController::show($attributes2['name']);

        // Add it to the post payload.
        $attributes['tag'] = $tag->id;


        $slug = $attributes['slug'];

        $post = post::where('slug', $slug)->first();
        $postID = $post->id;

        // dd($attributes);

        $this->json('POST','api/admin/posts/edit/'.$postID, $attributes);

        $post = post::where('slug', $slug)->first();

        // dd($post->tag);
        // $ckArr = iterator_to_array($post->tag[0]);
          $tags = $post->tag;

          $ckArr = array();
          foreach ($tags as $tag) {
                $ckArr[] = $tag->name;
            }

        // dd($ckArr);

        $this->assertContains($attributes2['name'], $ckArr);

    }
}
