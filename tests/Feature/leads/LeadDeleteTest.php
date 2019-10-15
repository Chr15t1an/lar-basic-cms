<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;

use App\User;

class LeadDeleteTest extends TestCase
{
  use WithFaker, DatabaseTransactions, WithoutMiddleware;
    /**
     * Test that a lead can be deleted.
     *
     * @return void
     * @test
     */
    public function can_delete_a_lead()
    {
      $attributes = [
        'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'email' => $this->faker->email,
        'plan' => $this->faker->word,
      ];


        $this->json('POST','api/signup',$attributes);
        $this->assertDatabaseHas('signups',$attributes);


        //Pull the record from the database for record id. 
        $testcontact = DB::table('signups')->where('email',$attributes['email'])->first();

        //Create a User
        $user = factory(User::class)->make();

        //Testing that the API works not the template or js.
        //Middleware Disabled .
         $route = 'api/admin/leads/'.$testcontact->id.'/delete';
         $response = $this->actingAs($user)
                ->post($route)
                ->assertOk();

       //Assert that it was deleted.
       $this->assertDatabaseMissing('signups', $attributes);




    }
}
