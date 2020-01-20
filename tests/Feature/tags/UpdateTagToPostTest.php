<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Tag;
use App\Post;
use App\Http\Controllers\TagController;


class UpdateTagToPostTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateTagToPost()
    {

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

        // Create Tag
        $attributes2 = [
          'name' => $this->faker->word,
        ];

        $this->json('POST','api/tag/create',$attributes2);
        $this->assertDatabaseHas('tags',$attributes2);

        //Get Cat ID.
        $tag = TagController::show($attributes2['name']);

        // Add it to the post payload.
        $attributes['tag'] = $tag->id;

        $slug = $attributes['slug'];
        $post = post::where('slug', $slug)->first();
        $postID = $post->id;

        $this->json('POST','api/admin/posts/edit/'.$postID, $attributes);

        $post = post::where('slug', $slug)->first();

        $tags = $post->tag;

        $ckArr = array();
        foreach ($tags as $tag) {
              $ckArr[] = $tag->name;
          }


      // Check that tag was attached
        $this->assertContains($attributes2['name'], $ckArr);
        //
        // // Create New Tag
        $attributes3 = [
          'name' => $this->faker->word,
        ];
        //
        $this->json('POST','api/tag/create',$attributes3);
        $this->assertDatabaseHas('tags',$attributes3);
        //
        //
        // //Get Cat ID.
        $tag2 = TagController::show($attributes3['name']);
        //
        // // Add it to the post payload.
        $attributes['tag'] = $tag2->id;
        //
        $this->json('POST','api/admin/posts/edit/'.$postID, $attributes);
        //
        //
        $post = post::where('slug', $slug)->first();
        //
        $tags = $post->tag;
        //
        $ckArr = array();
        foreach ($tags as $tag) {
              $ckArr[] = $tag->name;
          }
        //
        $this->assertContains($attributes3['name'], $ckArr);
        // // $this->assertEquals($attributes3['name'], $post->category->name);

    }
}
