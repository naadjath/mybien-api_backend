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
}

