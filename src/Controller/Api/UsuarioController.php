<?php

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;

class UsuarioController
{
    public function lista() : JsonResponse
    {
        return new JsonResponse(["implementar lista na API"], 404);
    }

    public function cadastra() : JsonResponse
    {
        return new JsonResponse(["implementar cadastro na API/não tive paciencia"], 404);
    }
}

