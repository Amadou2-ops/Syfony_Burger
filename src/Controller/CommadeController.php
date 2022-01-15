<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommadeController extends AbstractController
{
    #[Route('/commade', name: 'commade')]
    public function index(): Response
    {
        return $this->render('commade/index.html.twig', [
            'controller_name' => 'CommadeController',
        ]);
    }
}
