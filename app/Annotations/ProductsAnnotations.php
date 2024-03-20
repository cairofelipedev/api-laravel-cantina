<?php

namespace App\Annotations;

/**
 * @OA\Get(
 *     path="/api/products",
 *     summary="Listar todos os produtos",
 *     tags={"Produtos"},
 *     @OA\Response(
 *         response=200,
 *         description="Listagem de produtos",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example="1"),
 *             @OA\Property(property="name", type="string", example="Nome Produto 1"),
 *             @OA\Property(property="description", type="string", example="Descrição do Produto"),
 *             @OA\Property(property="price", type="integer", example="10.2"),
 *             @OA\Property(property="created_at", type="string", example="2024-03-19T16:55:45"),
 *             @OA\Property(property="updated_at", type="string", example="2024-03-19T16:55:45"),
 *         )
 *     ),
 * )
 * 
 * @OA\Post(
 *     path="/api/products",
 *     summary="Criar um novo produto",
 *     tags={"Produtos"},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="name", type="string", example="Produto 1"),
 *             @OA\Property(property="description", type="string", example="Descrição do produto"),
 *             @OA\Property(property="price", type="number", format="float", example="10.99"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Produto Criado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="success"),
 *         )
 *     ),
 *     @OA\Response(
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
 *     path="/api/products/{id}",
 *     summary="Exibir um produto específico",
 *     tags={"Produtos"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID do produto",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(response="200", description="Exibir um produto específico"),
 *     @OA\Response(response="404", description="Produto não encontrado"),
 * )
 * 
 * @OA\Put(
 *     path="/api/products/{id}",
 *     summary="Atualizar um produto",
 *     tags={"Produtos"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID do produto a ser atualizado",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 * @OA\RequestBody(
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="name", type="string", example="Produto atualizado"),
 *             @OA\Property(property="description", type="string", example="Descrição do produto atualizado"),
 *             @OA\Property(property="price", type="number", format="float", example="15.99"),
 *         )
 *     ),
 *    @OA\Response(
 *         response=200,
 *         description="Produto atualizado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="success"),
 *         )
 *     ),
 *     @OA\Response(
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
 * @OA\Delete(
 *     path="/api/products/{id}",
 *     summary="Excluir um produto",
 *     tags={"Produtos"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID do produto a ser excluído",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(response="200", description="Produto excluído com sucesso"),
 *     @OA\Response(response="404", description="Produto não encontrado"),
 * )
 */

class ProductsAnnotations
{
}
