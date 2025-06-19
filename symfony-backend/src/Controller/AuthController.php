<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(): JsonResponse
    {
        // Este método será interceptado por LexikJWTAuthenticationBundle.
        // Si llegas aquí, es porque algo salió mal.
        return $this->json([
            'message' => 'Este endpoint debe ser manejado por el JWT authenticator.'
        ], 401);
    }
}
