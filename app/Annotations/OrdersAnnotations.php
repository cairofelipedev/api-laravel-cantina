<?php

namespace App\Annotations;

/**
 * @OA\Get(
 *     path="/api/orders",
 *     summary="Listar todos os pedidos",
 *     tags={"Pedidos"},
 *     @OA\Response(response="200", description="Lista todos os pedidos"),
 * )
 *     @OA\Post(
 *     path="/api/orders",
 *     summary="Criar um novo pedido",
 *     tags={"Pedidos"},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="items", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="product_id", type="integer", example="1"),
 *                     @OA\Property(property="quantity", type="integer", example="5"),
 *                 )
 *             ),
 *         )
 *     ),
 *     @OA\Response(response="200", description="Pedido criado com sucesso"),
 *     @OA\Response(response="422", description="Erro de validação"),
 * )
 */

class OrdersAnnotations
{
}
