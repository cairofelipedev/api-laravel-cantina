<?php

namespace App\Annotations;

/**
 * @OA\Get(
 *     path="/api/orders",
 *     summary="Listar todos os pedidos",
 *     tags={"Pedidos"},
 *     @OA\Response(response="200", description="Lista todos os pedidos"),
 * )
 * 
 * @OA\Post(
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
 *     @OA\Response(
 *         response=200,
 *         description="Pedido criado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="success"),
 *         )
 *     ),
 *      @OA\Response(
 *         response=422,
 *         description="Erros",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="boolean", example="false"),
 *             @OA\Property(property="message", type="string", example="Validation error"),
 *             @OA\Property(property="erros", type="object",
 *                 @OA\Property(property="error", type="string", example="Error"),
 *             )
 *         )
 *     )
 * )
 * 
 * @OA\Get(
 *     path="/api/orders/{id}",
 *     summary="Exibir um pedido específico",
 *     tags={"Pedidos"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID do pedido",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Detalhes do pedido",
 *         @OA\JsonContent(
 *             @OA\Property(property="order_id", type="integer", example="2"),
 *             @OA\Property(property="total", type="number", format="float", example="24.2"),
 *             @OA\Property(
 *                 property="items",
 *                 type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="product_id", type="integer", example="1"),
 *                     @OA\Property(property="quantity", type="integer", example="2"),
 *                     @OA\Property(property="price", type="number", format="float", example="12.10"),
 *                     @OA\Property(property="total", type="number", format="float", example="24.2"),
 *                     @OA\Property(property="product_name", type="string", example="Teste"),
 *                     @OA\Property(property="product_description", type="string", example="teste")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(response="404", description="Pedido não encontado"),
 * )
 */

class OrdersAnnotations
{
}
