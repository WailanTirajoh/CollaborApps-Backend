<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_new_user()
    {

        $this->post(route('register'), [
            'name' => 'Wailan Tirajoh',
            'email' => 'examplea@gmail.com',
            'password' => 'password',
        ])->assertInvalid();

        $this->post(route('register'), [
            'name' => 'Wailan Tirajoh',
            'email' => 'examplea@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password_salah',
        ])->assertInvalid();

        $this->post(route('register'), [
            'name' => 'Wailan Tirajoh',
            'email' => 'examplea@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertOk();
    }
}
