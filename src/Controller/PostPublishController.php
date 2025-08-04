<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostPublishController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em) {}

    public function __invoke(Post $data): JsonResponse
    {
        $data->setOnline(true);
        $this->em->flush();

        return $this->json([
            'message' => 'Post published successfully',
            'id' => $data->getId(),
            'online' => $data->isOnline(),
        ]);
    }
}

