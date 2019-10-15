<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class CheckRegistrationFailsIfDisabledTest extends TestCase
{
    /**
     * Check that registration fails when disabled.
     *
     * @return void
     * @test
     */

    public function test_registration_Fails_if_off()
    {

        //Get current registration status.
        $reg_status = \App\Http\Controllers\MetavalueController::get_metadata('registration');

        //an array on the disabled state for this meta value to be passed to the assert fuction.
        $attributes = [
          'meta_key' => 'registration',
          'meta_value' => 0,
        ];

        //Set the registration status to disabled.
        \App\Http\Controllers\MetavalueController::update('registration', 0);

        // Check The database and assert that registration is disabled.
        $this->assertDatabaseHas('metavalues',$attributes);
        return $reg_status;
    }


    /**
      * @depends test_registration_Fails_if_off
      * This function is needed because (I think)
      * We need two Test instances
      * because it creates a new request which reloads
      * the routes file disabling registration routes.
      *
      */

    public function test_registration_Fails_if_off_p2($reg_status)
    {


        // Check that Form Doesnt Show
        $response = $this->get('/register');
        $response->assertStatus(404);

        // Check that the post request fails.
        $response = $this->post('/register');
        $response->assertStatus(404);

        // Set back to origional registration.
        \App\Http\Controllers\MetavalueController::update('registration', $reg_status);
        //
        $attr = [
          'meta_key' => 'registration',
          'meta_value' => $reg_status,
        ];
        // Check The database.
        $this->assertDatabaseHas('metavalues',$attr);
    }

}
