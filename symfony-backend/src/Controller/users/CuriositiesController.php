<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CuriositiesController extends AbstractController
{
    #[Route('/curiosities', name: 'app_curiosities')]
    public function index(): Response
    {
        return $this->render('curiosities/index.html.twig', [
            'controller_name' => 'CuriositiesController',
        ]);
    }
}
