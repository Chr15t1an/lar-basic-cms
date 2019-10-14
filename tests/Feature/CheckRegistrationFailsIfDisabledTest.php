<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class CheckRegistrationFailsIfDisabledTest extends TestCase
{
  // use DatabaseTransactions;
    public $regStatus = '0';



    public function setRegvar($testvar) {
        $this->regStatus = $testvar;
    }
    public function getRegvar() {
        return $this->regStatus;
    }

    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */

    public function test_registration_Fails_if_off()
    {
        // $this->$r = dd(\App\Http\Controllers\MetavalueController::get_metadata('registration'));

        $reg = \App\Http\Controllers\MetavalueController::get_metadata('registration');

        self::setRegvar($reg);

        // $this->regStatus = $reg;

        // dd($this->regStatus);


        // $response = $this->get('/');
        $attributes = [ // sentence
          'meta_key' => 'registration',
          'meta_value' => 0,
        ];
        //
        // //Get current status


        // update($meta_key, $meta_value)
        \App\Http\Controllers\MetavalueController::update('registration', 0);

        // Check The database.
        $this->assertDatabaseHas('metavalues',$attributes);



    }


    /**
         * @depends test_registration_Fails_if_off
         */

    public function test_registration_Fails_if_off_p2()
    {

      dd(self::getRegvar());
        $response = $this->get('/register');
        $response->assertStatus(404);

        // Set back to origional
        $stat = $this->regStatus; //self::getRegvar();
        // dd($stat);
        \App\Http\Controllers\MetavalueController::update('registration', $stat);
        //
        $attr = [ // sentence
          'meta_key' => 'registration',
          'meta_value' => $stat,
        ];
        //
        // // Check The database.
        $this->assertDatabaseHas('metavalues',$attr);
    }






}// // $response = $this->get('/');
// $attributes = [ // sentence
//   'meta_key' => 'registration',
//   'meta_value' => 0,
// ];
// //
// // //Get current status
// $registration = \App\Http\Controllers\MetavalueController::get_metadata('registration');
//
// // update($meta_key, $meta_value)
// \App\Http\Controllers\MetavalueController::update('registration', 0);
//
// // Check The database.
// $this->assertDatabaseHas('metavalues',$attributes);

// $registration = \App\Http\Controllers\MetavalueController::get_metadata('registration');

// $r = \App\Http\Controllers\MetavalueController::get_metadata('registration');
// dd($registration);
// $registration = \App\Http\Controllers\MetavalueController::get_metadata('registration');
// Form Should be redirected

// dd();

// dd($response);
//
//
// $user = factory(User::class)->create();
// // $this->actingAs($user, 'api')
//
// //Update it to false
// $this->actingAs($user, 'api')->json('POST','api/meta/update',[
//             'meta_key' => 'registration',
//             'meta_value' => 0,
//         ]);
//
//   // Check that the DB Has been updated.
//   $this->assertDatabaseHas('metavalues',$attributes);
//

  // dd($this);




    // dd($response);


/////////
/////////
///////////// Being redirected as logged in
////////////
/////////
/////////


// $user = factory(User::class)->create();
// $this->actingAs($user, 'api')

// dd($registration);
// $response = $this->actingAs($user, 'api')->get('/admin');
// $response->assertOK();
//set reg status to false

//
// $response = $this->get('/register');
// $response->assertStatus(404);
//
// //Set back to origional
// \App\Http\Controllers\MetavalueController::update('registration', $registration);
//
// $attr = [ // sentence
//   'meta_key' => 'registration',
//   'meta_value' => $registration,
// ];
//
// // Check The database.
// $this->assertDatabaseHas('metavalues',$attr);


// Form Should be redirected

// $response = $this->get('/register');
//
// dd($response);


// user creation should fail

       //  $user = factory(User::class)->make();
       //  $response = $this->post('register', [
       //     'name' => $user->name,
       //     'email' => $user->email,
       //     'password' => 'password',
       //     'password_confirmation' => 'password'
       // ]);
       //
       // dd( $response);
       // $response->assertStatus(302);


// //Update back to original state
//   $this->json('POST','api/meta/update',[
//             'meta_key' => 'registration',
//             'meta_value' => $registration,
//         ]);
//
//   //Check that it was back.
//   $response = $this->json('POST','api/meta/get',[
//                             'meta_key' => 'registration',
//                 ]);
//
//   $response->assertSee($registration);
