<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="API Cantina",
 *     version="1.0.0",
 *     description="Descrição da sua API",
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
 * @OA\Get(
 *     path="/api/auth/login",
 *     @OA\Response(response="200", description="An example endpoint")
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
