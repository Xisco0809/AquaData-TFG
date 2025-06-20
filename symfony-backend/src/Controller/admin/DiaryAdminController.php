<?php

namespace App\Controller\admin;

use App\Entity\Diary;
use App\Repository\DiaryRepository;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/admin/diary')]
class DiaryAdminController extends AbstractController
{
    #[Route('/', name: 'diary_index', methods: ['GET'])]
    public function index(DiaryRepository $repository): JsonResponse
    {
        return $this->json($repository->findAll(), Response::HTTP_OK, [], ['groups' => 'diary:read']);
    }

    #[Route('/{id}', name: 'diary_show', methods: ['GET'])]
    public function show(Diary $diary): JsonResponse
    {
        return $this->json($diary, Response::HTTP_OK, [], ['groups' => 'diary:read']);
    }

    #[Route('/', name: 'diary_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $diary = new Diary();
        $diary->setDate(new \DateTime($data['date']));
        $diary->setSpecies($data['species'] ?? '');
        $diary->setQuantity($data['quantity'] ?? 0);
        $diary->setNotes($data['notes'] ?? '');

        $user = $em->getRepository(User::class)->find($data['user_id'] ?? null);
        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $diary->setUsers($user);

        $em->persist($diary);
        $em->flush();

        return $this->json($diary, Response::HTTP_CREATED, [], ['groups' => 'diary:read']);
    }

    #[Route('/{id}', name: 'diary_update', methods: ['PUT'])]
    public function update(Request $request, Diary $diary, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['date'])) $diary->setDate(new \DateTime($data['date']));
        $diary->setSpecies($data['species'] ?? $diary->getSpecies());
        $diary->setQuantity($data['quantity'] ?? $diary->getQuantity());
        $diary->setNotes($data['notes'] ?? $diary->getNotes());

        if (isset($data['user_id'])) {
            $user = $em->getRepository(User::class)->find($data['user_id']);
            if (!$user) return new JsonResponse(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
            $diary->setUsers($user);
        }

        $em->flush();

        return $this->json($diary, Response::HTTP_OK, [], ['groups' => 'diary:read']);
    }

    #[Route('/{id}', name: 'diary_delete', methods: ['DELETE'])]
    public function delete(Diary $diary, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($diary);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
