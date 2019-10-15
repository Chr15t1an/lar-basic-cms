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
   * Test that a message can be read.
   *
   * @return void
   * @test
   */
   public function a_admin_can_read_aContact_msg()
   {

     $attributes = [
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

       //Testing that the API works not the template or js.
       //Middleware Disabled .
       $route = 'api/admin/contacts/'.$testcontact->id;
        $response = $this->actingAs($user)
               ->get($route)
               ->assertJson($attributes);



   }
}
