<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactMessageReadTest extends TestCase
{
      use WithFaker, DatabaseTransactions;
  /**
   * A basic feature test example.
   *
   * @return void
   * @test
   */
   // public function a_admin_can_read_aContact_msg()
   // {
   //   ~
   //   $attributes = [ // sentence
   //     'first_name' => $this->faker->word,
   //     'last_name' => $this->faker->word,
   //     'email' => $this->faker->email,
   //     'msg' => $this->faker->paragraph,
   //   ];
   //
   //
   //     $this->json('POST','api/contact',$attributes);
   //
   //     $this->assertDatabaseHas('contacts',$attributes);
   //
   // }
}
