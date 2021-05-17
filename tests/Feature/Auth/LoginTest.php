<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * Test if the user can view a login form
     *
     * @return void
     */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
	
	/**
     * Test required fields for registration
     *
     * @return void
     */
	public function testRequiredFieldsForRegistration()
    {
        $this->json('POST', '/register', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                ]
            ]);
    }
	
	/**
     * Test repeat passwords
     *
     * @return void
     */
	public function testRepeatPassword()
    {
        $userData = [
            "name" => "Venancio Gomani",
            "email" => "cadlegomani@gmail.com",
            "password" => "admin123"
        ];

        $this->json('POST', '/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "password" => ["The password confirmation does not match."]
                ]
            ]);
    }
	
	public function testMustEnterEmailAndPassword()
    {
        $this->json('POST', '/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'email' => ["The email field is required."],
                    'password' => ["The password field is required."],
                ]
            ]);
    }
	

	
}
