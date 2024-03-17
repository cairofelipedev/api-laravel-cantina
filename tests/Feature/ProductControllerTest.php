<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use Tests\Utils\AuthUtils;

class ProductControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_create_product()
    {

        $token = AuthUtils::authenticateUser($this);

        $data = [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 10.99,
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('POST', '/api/products', $data);

        $response->assertStatus(200)
            ->assertJson(['status' => 'success']);
    }
}
