<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckAdminRoutesFailForGuestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function Admin_Routes_Fail_test()
    {
        $response = $this->get('/admin');
        $response->assertStatus(302);

        $response = $this->get('/admin/apiKeys');
        $response->assertStatus(302);


    }
}
