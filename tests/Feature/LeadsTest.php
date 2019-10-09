<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LeadsTest extends TestCase
{
  use WithFaker, DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function a_guest_can_sign_up_as_a_lead()
    {
      $attributes = [ // sentence
        'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'email' => $this->faker->email,
        'plan' => $this->faker->word,
      ];


        $this->json('POST','api/signup',$attributes);
        $this->assertDatabaseHas('signups',$attributes);

    }
}
