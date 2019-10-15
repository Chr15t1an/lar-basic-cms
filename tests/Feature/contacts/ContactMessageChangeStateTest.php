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
   * Tests changing the read and archive state on an email.
   *
   * @return void
   * @test
   */
   public function markRead_markArchive_msg()
   {
     //Create faker data
     $attributes = [
       'first_name' => $this->faker->word,
       'last_name' => $this->faker->word,
       'email' => $this->faker->email,
       'msg' => $this->faker->paragraph,
     ];

     //Send post to contact endpoint.
       $this->json('POST','api/contact',$attributes);

       // Assert that it is in the database.
       $response = $this->assertDatabaseHas('contacts',$attributes);
       $testcontact = DB::table('contacts')->where('email',$attributes['email'])->first();

       // Mark Read
       $this->json('GET','api/email/read/'.$testcontact->id)
            ->assertOk();

       // Mark Archive
       $this->json('GET','api/email/archive/'.$testcontact->id)
            ->assertOk();

      // Get the same record by id via api
      $a = [
        'read' => 1,
        'archived' => 1,
      ];

      $user = factory(User::class)->make();

      //Assert the data is found in the response
      $route = 'api/admin/contacts/'.$testcontact->id;
      $response = $this->actingAs($user)
              ->get($route)
              ->assertJsonFragment($a);



   }
}
