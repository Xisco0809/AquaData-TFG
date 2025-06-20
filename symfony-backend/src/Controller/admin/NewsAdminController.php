<?php

namespace App\Controller\admin;

use App\Entity\News;
use App\Repository\NewsRepository;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/admin/news')]
class NewsAdminController extends AbstractController
{
    #[Route('/', name: 'news_index', methods: ['GET'])]
    public function index(NewsRepository $repository): JsonResponse
    {
        $news = $repository->findAll();
        return $this->json($news, Response::HTTP_OK, [], ['groups' => 'news:read']);
    }

    #[Route('/{id}', name: 'news_show', methods: ['GET'])]
    public function show(News $news): JsonResponse
    {
        return $this->json($news, Response::HTTP_OK, [], ['groups' => 'news:read']);
    }

    #[Route('/', name: 'news_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $news = new News();
        $news->setTitle($data['title'] ?? '');
        $news->setDescription($data['description'] ?? '');

        $user = $em->getRepository(User::class)->find($data['user_id'] ?? null);
        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $news->setUsers($user);

        $em->persist($news);
        $em->flush();

        return $this->json($news, Response::HTTP_CREATED, [], ['groups' => 'news:read']);
    }

    #[Route('/{id}', name: 'news_update', methods: ['PUT'])]
    public function update(Request $request, News $news, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $news->setTitle($data['title'] ?? $news->getTitle());
        $news->setDescription($data['description'] ?? $news->getDescription());

        if (isset($data['user_id'])) {
            $user = $em->getRepository(User::class)->find($data['user_id']);
            if (!$user) {
                return new JsonResponse(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
            }
            $news->setUsers($user);
        }

        $em->flush();

        return $this->json($news, Response::HTTP_OK, [], ['groups' => 'news:read']);
    }

    #[Route('/{id}', name: 'news_delete', methods: ['DELETE'])]
    public function delete(News $news, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($news);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
