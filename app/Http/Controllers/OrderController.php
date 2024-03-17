<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        // Create Order
        $order = Order::create([]);

        // Add items
        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            $orderItem = new OrderItem([
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'total' => $product->price * $item['quantity'],
            ]);
            $order->orderItems()->save($orderItem);
        }

        return response()->json(['message' => 'Order create', 'order_id' => $order->id]);
    }
}
