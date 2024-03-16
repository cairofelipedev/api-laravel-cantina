<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_product()
    {
        $data = [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 10.99,
        ];

        $response = $this->json('POST', '/api/products', $data);

        $response->assertStatus(201)
            ->assertJson(['status' => 'success']);
    }
}
