<?php

namespace App\Annotations;

/**
 * 
 * @OA\Post(
 *     path="/api/auth/login",
 *     summary="Autenticação do usuário",
 *     description="Autentica um usuário na aplicação.",
 *     tags={"Autenticação"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="Dados de autenticação do usuário",
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email", example="admin@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="admin")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Usuário autenticado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Credenciais inválidas",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="error"),
 *             @OA\Property(property="message", type="string", example="Unauthorized") 
 *         )
 *     )
 * )
 */

class LoginAnnotations
{
}
