<?php

namespace Tests\Utils;

use Tests\TestCase;
use App\Models\User;

class AuthUtils
{
    public static function authenticateUser(TestCase $testCase)
    {
        // Criar um usuário
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Simular uma solicitação de login para obter o token de autenticação
        $response = $testCase->json('POST', '/api/auth/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Verificar se o login foi bem-sucedido
        $response->assertStatus(200);

        return $response->json('token');
    }

    public static function authenticatedJsonRequest(TestCase $testCase, string $token, string $endpoint, array $data, string $method)
    {
        return $testCase->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json($method, $endpoint, $data);
    }
}
