<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckAdminRoutesFailForGuestTest extends TestCase
{
    /**
     * Check that admin routes are unaccessable to guests.
     *
     * @return void
     * @test
     */
    public function Admin_Routes_Fail_test()
    {
        $response = $this->get('/admin');
        $response->assertStatus(302);

        $response = $this->get('/admin/settings');
        $response->assertStatus(302);


    }
}
