<?php

namespace App\Controller\admin;

use App\Entity\Curiosities;
use App\Repository\CuriositiesRepository;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/admin/curiosities')]
class CuriositiesAdminController extends AbstractController
{
    #[Route('/', name: 'curiosities_index', methods: ['GET'])]
    public function index(CuriositiesRepository $repository): JsonResponse
    {
        $curiosities = $repository->findAll();

        return $this->json($curiosities, Response::HTTP_OK, [], ['groups' => 'curiosity:read']);
    }

    #[Route('/{id}', name: 'curiosities_show', methods: ['GET'])]
    public function show(Curiosities $curiosity): JsonResponse
    {
        return $this->json($curiosity, Response::HTTP_OK, [], ['groups' => 'curiosity:read']);
    }

    #[Route('/', name: 'curiosities_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $curiosity = new Curiosities();
        $curiosity->setTitle($data['title'] ?? '');
        $curiosity->setDescription($data['description'] ?? '');
        $curiosity->setCategory($data['category'] ?? '');

        // Busca el usuario (asociado por ID)
        $user = $em->getRepository(User::class)->find($data['user_id'] ?? null);
        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $curiosity->setUsers($user);

        $em->persist($curiosity);
        $em->flush();

        return $this->json($curiosity, Response::HTTP_CREATED, [], ['groups' => 'curiosity:read']);
    }

    #[Route('/{id}', name: 'curiosities_update', methods: ['PUT'])]
    public function update(Request $request, Curiosities $curiosity, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $curiosity->setTitle($data['title'] ?? $curiosity->getTitle());
        $curiosity->setDescription($data['description'] ?? $curiosity->getDescription());
        $curiosity->setCategory($data['category'] ?? $curiosity->getCategory());

        if (isset($data['user_id'])) {
            $user = $em->getRepository(User::class)->find($data['user_id']);
            if (!$user) {
                return new JsonResponse(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
            }
            $curiosity->setUsers($user);
        }

        $em->flush();

        return $this->json($curiosity, Response::HTTP_OK, [], ['groups' => 'curiosity:read']);
    }

    #[Route('/{id}', name: 'curiosities_delete', methods: ['DELETE'])]
    public function delete(Curiosities $curiosity, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($curiosity);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
