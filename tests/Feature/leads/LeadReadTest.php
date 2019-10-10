<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Illuminate\Support\Facades\DB;

use App\User;


class LeadsReadTest extends TestCase
{
      use WithFaker, DatabaseTransactions, WithoutMiddleware;
  /**
   * A basic feature test example.
   *
   * @return void
   * @test
   */
   public function can_read_a_lead()
   {

     $attributes = [ // sentence
       'first_name' => $this->faker->word,
       'last_name' => $this->faker->word,
       'email' => $this->faker->email,
       'plan' => $this->faker->word,
     ];


       // $this->json('POST','api/contact',$attributes);

       $this->json('POST','api/signup',$attributes);
       $this->assertDatabaseHas('signups',$attributes);

       // its in the database
       // $response = $this->assertDatabaseHas('contacts',$attributes);
       // $testcontact = DB::table('signups')->where('email',$attributes['email'])->first();

       //Create a User
       $user = factory(User::class)->make();

       //Testing that the API works not the template or js.
       //Middleware Disabled .
       $route = 'api/admin/leads';
        $response = $this->actingAs($user)
               ->get($route)
               ->assertJsonFragment($attributes);


   }
}
