<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthController extends AbstractController
{
    #[Route('/api/test', name: 'api_test')]
    public function index(): Response
    {
        return $this->json([
            'message' => 'API Auth OK',
        ]);
    }

    #[Route('/api/register', name: 'api_register', methods: ['POST'])]
     public function register(): Response
    {
             // C'est ici que tu mettras la logique d'inscription plus tard
        return $this->json([
            'message' => 'Route Register OK !'
        ]);
    }
}

