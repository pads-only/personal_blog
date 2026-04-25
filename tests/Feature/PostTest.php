<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_redirect_to_login_when_not_authorized(): void
    {
        $response = $this->get('/blog');

        $response->assertRedirect(route('login'));
    }
}
