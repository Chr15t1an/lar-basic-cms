<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactMessageCreateTest extends TestCase
{

  use WithFaker, DatabaseTransactions;
    /**
     * Test that a guest can submit a contact message.
     * @return void
     * @test
     */
     public function a_guest_can_send_contact_msg()
     {
       $attributes = [
         'first_name' => $this->faker->word,
         'last_name' => $this->faker->word,
         'email' => $this->faker->email,
         'msg' => $this->faker->paragraph,
       ];

         $this->json('POST','api/contact',$attributes);
         $this->assertDatabaseHas('contacts',$attributes);

     }
}
