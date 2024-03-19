<?php

namespace App\Annotations;

/**
 * 
 * @OA\Post(
 *     path="/api/auth/register",
 *     summary="Registro do usuário",
 *     description="Cria um usuário na aplicação.",
 *     tags={"Registro"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="Criação de um usuário",
 *         @OA\JsonContent(
 *             required={"name", "email", "password"},
 *             @OA\Property(property="name", type="string", example="User"),
 *             @OA\Property(property="email", type="string", format="email", example="admin@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="admin")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Usuário criado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="boolean", example="true"),
 *             @OA\Property(property="message", type="string", example="success"),
 *             @OA\Property(property="user", type="object",
 *                 @OA\Property(property="name", type="string", example="Name User"),
 *                 @OA\Property(property="email", type="string", format="email", example="admin@example.com"),
 *                 @OA\Property(property="created_at", type="string", example="2024-03-19T16:55:45"),
 *                 @OA\Property(property="updated_at", type="string", example="2024-03-19T16:55:45"),
 *                 @OA\Property(property="id", type="integer", example="1"),
 *             )
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
 */

class RegisterAnnotations
{
}
