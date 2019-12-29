<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ExportPosts extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExportPosts()
    {

      // Insert Posts
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


        $response = $this->get('/admin/posts/export')
                           ->assertHeader('content-type', 'text/csv; charset=UTF-8')
                           ->assertOk();

        //Store the Stramed content (CSV Content )
        $content = $response->streamedContent();

        //Using the test object, test that our faker lead is in the content sent in the download.
          $this->assertContains($attributes['title'], $content);
          $this->assertContains($attributes['body'], $content);
          $this->assertContains($attributes['featured_image'], $content);
          $this->assertContains($attributes['template'], $content);
          $this->assertContains($attributes['meta_title'], $content);
          $this->assertContains($attributes['meta_description'], $content);
          $this->assertContains($attributes['slug'], $content);
          $this->assertContains($attributes['status'], $content);



    }
}
