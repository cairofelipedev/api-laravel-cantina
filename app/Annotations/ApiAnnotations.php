<?php

namespace App\Annotations;

/**
 * @OA\Info(
 *     title="API Cantina",
 *     version="1.0.0",
 *     description="Desenvolvimento de API para uma Cantina Escolar utilizando Laravel e MySQL.",
 *     @OA\Contact(
 *         email="seu@email.com",
 *         name="Nome do Contato"
 *     ),
 *     @OA\License(
 *         name="Licença",
 *         url="URL da licença"
 *     )
 * )
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
 *             @OA\Property(property="email", type="string", format="email", example="usuario@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="senha123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Usuário autenticado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."),
 *             @OA\Property(property="token_type", type="string", example="Bearer"),
 *             @OA\Property(property="expires_in", type="integer", example="3600"),
 *             @OA\Property(property="user", type="object",
 *                 @OA\Property(property="id", type="integer", example="1"),
 *                 @OA\Property(property="name", type="string", example="Usuário de Exemplo"),
 *                 @OA\Property(property="email", type="string", format="email", example="usuario@example.com")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Credenciais inválidas",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Credenciais inválidas.")
 *         )
 *     )
 * )
 */

class ApiAnnotations
{
}
