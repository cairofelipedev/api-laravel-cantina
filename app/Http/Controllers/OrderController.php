<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

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

    public function show($id)
    {
        $order = Order::with('items.product')->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

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

        $results = [
            'order_id' => $order->id,
            'total' => $total,
            'items' => $items,
        ];

        return response()->json($results);
    }
}
