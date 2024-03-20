<?php 
use Tests\TestCase;
use App\Models\Order;
use App\Models\OrderItem;

class OrderTotalTest extends TestCase
{
    public function test_order_total_calculation()
    {
        // Criar uma instância de Order com alguns itens
        $order = new Order();
        $order->items = [
            new OrderItem(['quantity' => 2, 'price' => 10.00]),
            new OrderItem(['quantity' => 1, 'price' => 20.00]),
        ];

        // Calcular o total esperado manualmente
        $expected_total = 0;
        foreach ($order->items as $item) {
            $expected_total += $item->quantity * $item->price;
        }

        // Verificar se o total calculado é igual ao total esperado
        $this->assertEquals($expected_total, $order->total_items());
    }
}
