<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCustomerTest extends TestCase
{
    // Clears database before each test
    use RefreshDatabase;

    public function test_a_user_can_create_a_customer()
    {
        $firstName = 'Omid';
        $lastName = 'Kiani';
        $dateOfBirth = '1372/04/02';
        $phoneNumber = '09331116877';
        $email = 'kianiomid11@gmail.com';
        $bankAccountNumber = '240470000000007417144412';

        // **This will initially fail as the functionality is not implemented**
        $response = $this->post('/api/v1/customers', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'date_of_birth' => $dateOfBirth,
            'phone_number' => $phoneNumber,
            'email' => $email,
            'bank_account_number' => $bankAccountNumber
        ]);

        $response->assertStatus(201); // Assert successful creation (201 Created)
        $this->assertDatabaseHas('customers', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'date_of_birth' => $dateOfBirth,
            'phone_number' => $phoneNumber,
            'email' => $email,
            'bank_account_number' => $bankAccountNumber
        ]);
    }
}
