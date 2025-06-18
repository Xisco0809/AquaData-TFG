<?php

namespace App\Controller\admin;

use App\Entity\MarineSpecies;
use App\Repository\MarineSpeciesRepository;
use App\Entity\User;
use App\Entity\Diary;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/admin/marine-species')]
class MarineSpeciesAdminController extends AbstractController
{
    #[Route('/', name: 'marine_species_index', methods: ['GET'])]
    public function index(MarineSpeciesRepository $repository): JsonResponse
    {
        $species = $repository->findAll();
        return $this->json($species, Response::HTTP_OK, [], ['groups' => 'marine:read']);
    }

    #[Route('/{id}', name: 'marine_species_show', methods: ['GET'])]
    public function show(MarineSpecies $species): JsonResponse
    {
        return $this->json($species, Response::HTTP_OK, [], ['groups' => 'marine:read']);
    }

    #[Route('/', name: 'marine_species_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $species = new MarineSpecies();
        $species->setName($data['name'] ?? '');
        $species->setImage($data['image'] ?? '');
        $species->setAvarageWeight($data['avarage_weight'] ?? 0);
        $species->setMeasurements($data['measurements'] ?? '');
        $species->setDescription($data['description'] ?? '');
        $species->setCategory($data['category'] ?? '');

        $user = $em->getRepository(User::class)->find($data['user_id'] ?? null);
        $diary = $em->getRepository(Diary::class)->find($data['diary_id'] ?? null);

        if (!$user || !$diary) {
            return new JsonResponse(['error' => 'User or Diary not found'], Response::HTTP_NOT_FOUND);
        }

        $species->setUsers($user);
        $species->setDiary($diary);

        $em->persist($species);
        $em->flush();

        return $this->json($species, Response::HTTP_CREATED, [], ['groups' => 'marine:read']);
    }

    #[Route('/{id}', name: 'marine_species_update', methods: ['PUT'])]
    public function update(Request $request, MarineSpecies $species, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $species->setName($data['name'] ?? $species->getName());
        $species->setImage($data['image'] ?? $species->getImage());
        $species->setAvarageWeight($data['avarage_weight'] ?? $species->getAvarageWeight());
        $species->setMeasurements($data['measurements'] ?? $species->getMeasurements());
        $species->setDescription($data['description'] ?? $species->getDescription());
        $species->setCategory($data['category'] ?? $species->getCategory());

        if (isset($data['user_id'])) {
            $user = $em->getRepository(User::class)->find($data['user_id']);
            if (!$user) return new JsonResponse(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
            $species->setUsers($user);
        }

        if (isset($data['diary_id'])) {
            $diary = $em->getRepository(Diary::class)->find($data['diary_id']);
            if (!$diary) return new JsonResponse(['error' => 'Diary not found'], Response::HTTP_NOT_FOUND);
            $species->setDiary($diary);
        }

        $em->flush();

        return $this->json($species, Response::HTTP_OK, [], ['groups' => 'marine:read']);
    }

    #[Route('/{id}', name: 'marine_species_delete', methods: ['DELETE'])]
    public function delete(MarineSpecies $species, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($species);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
