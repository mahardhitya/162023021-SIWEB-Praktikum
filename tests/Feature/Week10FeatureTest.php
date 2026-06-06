<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Week10FeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_halaman_login_mengembalikan_status_200(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_route_redirect_google_mengembalikan_status_302(): void
    {
        $response = $this->get('/auth/google');

        $response->assertStatus(302);
    }
}
