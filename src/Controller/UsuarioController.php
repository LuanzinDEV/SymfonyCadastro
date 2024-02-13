<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UsuarioController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index(Request $request): Response
    {
        return $this->render('cadastroUsuario.html.twig');
    }

    public function salvar(Request $request): Response
    {
        $dadosFormulario = $request->request->all();

        $usuario = new Usuario();
        $usuario->setNome($dadosFormulario['nome']);
        $usuario->setSenha($dadosFormulario['senha']);

        $this->entityManager->persist($usuario);
        $this->entityManager->flush();

        if( $usuario->getId() ){
            return $this->render('cadastroSucesso.html.twig',[
                'nome' => $usuario->getNome()
            ]);
        }else{
            return $this->render('cadastroErro.html.twig',[
                'nome' => $usuario->getNome()
            ]);
        }      
    }
}
