<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Illuminate\Support\Facades\DB;

use App\User;


class ContactMessageChangeStateTest extends TestCase
{
      use WithFaker, DatabaseTransactions, WithoutMiddleware;
  /**
   * A basic feature test example.
   *
   * @return void
   * @test
   */
   public function markRead_markArchive_msg()
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

       // Mark Read
       $this->json('GET','api/email/read/'.$testcontact->id)
            ->assertOk();

       // Mark Archive

       $this->json('GET','api/email/archive/'.$testcontact->id)
            ->assertOk();

      // Get the same record by id via api 

      $a = [ // sentence
        'read' => 1,
        'archived' => 1,
      ];

      $user = factory(User::class)->make();

      $route = 'api/admin/contacts/'.$testcontact->id;
      $response = $this->actingAs($user)
              ->get($route)
              ->assertJsonFragment($a);



   }
}
