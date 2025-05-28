<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MarineSpeciesController extends AbstractController
{
    #[Route('/marine/species', name: 'app_marine_species')]
    public function index(): Response
    {
        return $this->render('marine_species/index.html.twig', [
            'controller_name' => 'MarineSpeciesController',
        ]);
    }
}
