<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_register_page()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

}
