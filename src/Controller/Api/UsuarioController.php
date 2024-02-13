<?php

namespace App\Controller\Api;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UsuarioController extends AbstractController
{   
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function lista() : JsonResponse
    {
        $doctrine = $this->entityManager->getRepository(Usuario::class);

        $usuarios = $doctrine->findAll();

        return new JsonResponse($doctrine->pegarTodos());
    }

    public function cadastra() : Response
    {
        return new JsonResponse(["implementar cadastro na API/não tive paciencia"], 404);
    }
}

