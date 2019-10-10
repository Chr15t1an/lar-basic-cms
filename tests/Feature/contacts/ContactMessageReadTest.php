<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Illuminate\Support\Facades\DB;

use App\User;


class ContactMessageReadTest extends TestCase
{
      use WithFaker, DatabaseTransactions, WithoutMiddleware;
  /**
   * A basic feature test example.
   *
   * @return void
   * @test
   */
   public function a_admin_can_read_aContact_msg()
   {

     $attributes = [ // sentence
       'first_name' => $this->faker->word,
       'last_name' => $this->faker->word,
       'email' => $this->faker->email,
       'msg' => $this->faker->paragraph,
     ];


       $this->json('POST','api/contact',$attributes);

       // its in the database
       $response = $this->assertDatabaseHas('contacts',$attributes);
       $testcontact = DB::table('contacts')->where('email',$attributes['email'])->first();

       //Create a User
       $user = factory(User::class)->make();
       // dd($user);
       // $response = $this->actingAs($user)->get('/login');


       // $response = $this->json('GET', $route);

       //Testing that the API works not the template or js.
       $route = 'api/admin/contacts/'.$testcontact->id;




        $response = $this->actingAs($user)
               ->get($route)
               ->assertJson($attributes);

        // dd($response);


       // $this->actingAs($user)
       //         ->get($route)
       //         ->see($attributes['email']);
       //It can be called via the API.

       // $response;

       // dd($response);
       //
       // $response
       //     ->assertStatus(201)
       //     ->assertJson([
       //         'created' => true,
       //     ]);


       // read it from endpoint.



   }
}
