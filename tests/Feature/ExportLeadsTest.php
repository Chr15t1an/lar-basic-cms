<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ExportLeadsTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function testExportLeads()
    {


      // Add a new lead
      $attributes = [ // sentence
        'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'email' => $this->faker->email,
        'plan' => $this->faker->word,
      ];

        // Test Signup
        $this->json('POST','api/signup',$attributes);
        // assert that it is in the database
        $this->assertDatabaseHas('signups',$attributes);


        // Get the export
        $response = $this->get('/admin/leads/export')
                           ->assertHeader('content-type', 'text/csv; charset=UTF-8')
                           ->assertOk();

        //Store the Stramed content (CSV Content )
        $content = $response->streamedContent();

        //Using the test object, test that our faker lead is in the content sent in the download.
          $this->assertContains($attributes['first_name'], $content);
          $this->assertContains($attributes['last_name'], $content);
          $this->assertContains($attributes['email'], $content);
          $this->assertContains($attributes['plan'], $content);



    }
}
