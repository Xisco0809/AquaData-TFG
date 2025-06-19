<?php

namespace App\Controller\users;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/users')]
class UserController extends AbstractController
{
    private EntityManagerInterface $em;
    private UserRepository $userRepository;

    public function __construct(EntityManagerInterface $em, UserRepository $userRepository)
    {
        $this->em = $em;
        $this->userRepository = $userRepository;
    }

    #[Route('', methods: ['GET'])]
    public function getAllUsers(): JsonResponse
    {
        $users = $this->userRepository->findAll();

        $data = array_map(function (User $user) {
            return [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                
            ];
        }, $users);

        return $this->json($data);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function getUserbyId(int $id): JsonResponse
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            return $this->json(['message' => 'User not found'], 404);
        }

        return $this->json([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail()
            
        ]);
    }

    #[Route('', methods: ['POST'])]
    public function createUser(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['name'], $data['email'], $data['password'])) {
            return $this->json(['message' => 'Missing required fields'], 400);
        }

        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']); // encriptar la contraseña
        $user->setRole('ROLE_USER');

        $this->em->persist($user);
        $this->em->flush();

        return $this->json(['message' => 'User created', 'id' => $user->getId()], 201);
    }

    #[Route('/{id}', methods: ['PUT'])]
    public function updateUser(Request $request, int $id): JsonResponse
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            return $this->json(['message' => 'User not found'], 404);
        }

        $data = json_decode($request->getContent(), true);

        if (isset($data['name'])) {
            $user->setName($data['name']);
        }
        if (isset($data['email'])) {
            $user->setEmail($data['email']);
        }
        if (isset($data['password'])) {
            $user->setPassword($data['password']); // Deberías encriptar la contraseña
        }

        $this->em->flush();

        return $this->json(['message' => 'User updated']);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function deleteUser(int $id): JsonResponse
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            return $this->json(['message' => 'User not found'], 404);
        }

        $this->em->remove($user);
        $this->em->flush();

        return $this->json(['message' => 'User deleted']);
    }
}