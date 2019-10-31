<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;


use App\Post;

class UpdatePostTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdatePost()
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
        'status' => 'published',
      ];
        $this->json('POST','api/admin/posts/store',$attributes);
        $this->assertDatabaseHas('posts',$attributes);

        // hit an edit endpoint
        $slug = $attributes['slug'];

        $post = post::where('slug', $slug)->first();


        $postID = $post->id;

        // catch data
        $response = $this->json('get','api/admin/posts/edit/'.$postID);

        // dd($response);
        $response->assertSee($attributes['title']);
        $response->assertSee($attributes['body']);





        // Update

        $attributes2 = [
          'title' => 'Test Update Title',
          'body' => 'Test Update Body',
          'featured_image' => $attributes['featured_image'],
          'template' => $attributes['template'],
          'meta_title' => $attributes['meta_title'],
          'meta_description' => $attributes['meta_description'],
          'slug' => $attributes['slug'],
          'status' => $attributes['status'],
        ];


        // dd('api/admin/posts/edit/'.$postID);

        $this->json('POST','api/admin/posts/edit/'.$postID, $attributes2);


        // catch data
        $response = $this->json('get','api/admin/posts/edit/'.$postID);

        // dd($response);
        // $response->assertSee($attributes2['title']);
        // $response->assertSee($attributes2['body']);

        // hit an update

        $this->assertDatabaseHas('posts',$attributes2);


        // $response = $this->get('/');
        // $response->assertStatus(200);
    }
}
