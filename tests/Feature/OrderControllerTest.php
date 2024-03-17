<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Tests\Utils\AuthUtils;

class OrderControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_create_order()
    {
        $token = AuthUtils::authenticateUser($this);

        $product1 = Product::create([
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'price' => 10.00,
        ]);

        $product2 = Product::create([
            'name' => 'Product 2',
            'description' => 'Description of Product 2',
            'price' => 20.00,
        ]);

        $data = [
            'items' => [
                ['product_id' => $product1->id, 'quantity' => 2],
                ['product_id' => $product2->id, 'quantity' => 1]
            ]
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('POST', '/api/orders', $data);

        $response->assertStatus(200);
    }
}
