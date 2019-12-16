<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

use App\User;

class chargeTest extends TestCase
{
  use WithFaker, DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testChargingUser()
    {
      //
      $attributes = [
        'name' => $this->faker->word,
        'email' => $this->faker->email,
        'password' => $this->faker->paragraph,
      ];

      $user = factory(User::class)->make();


      // create subscription

      //Assert the data is found in the response
      // $route = 'api/admin/contacts/'.$testcontact->id;
      // $response = $this->actingAs($user)
      //         ->get($route)
      //         ->assertJsonFragment($a);
      //
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
