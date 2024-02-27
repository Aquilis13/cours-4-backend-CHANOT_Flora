<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Personne;

class PersonneController extends AbstractController
{
    #[Route('/personne', name: 'app_personne')]
    public function index(): Response
    {
        return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
        ]);
    }

    #[Route('/personne', name: 'get')]
    public function personneAll(): Response
    {
        $p = new Personne();
        $p->setNom("Michel");
        $p->setPrenom("Michel");
        
        return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
            'personne' => $p,
        ]);
    }
}
