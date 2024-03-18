<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('items.product')
            ->get()
            ->map(function ($order) {
                $total = $order->items->sum(function ($item) {
                    return $item->quantity * $item->product->price;
                });

                $items = $order->items->map(function ($item) {
                    return [
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                        'total' => $item->quantity * $item->product->price,
                        'product_name' => $item->product->name,
                        'product_description' => $item->product->description,
                    ];
                });

                return [
                    'order_id' => $order->id,
                    'total' => $total,
                    'items' => $items,
                ];
            });

        return response()->json($orders);
    }

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
            $order->items()->save($orderItem);
        }

        return response()->json(['message' => 'Order create', 'order_id' => $order->id]);
    }
}
