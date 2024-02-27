<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Personne;
use App\Entity\Batiment;

class PersonneController extends AbstractController
{
    #[Route('/personne', name: 'app_personne')]
    public function index(): Response
    {
        $personne = new Personne();
        $personne->setId(42);
        $personne->setNom('Jean');
        $personne->setPrenom('Jack');

        $batiment1 = new Batiment();
        $batiment1->setId(1);
        $batiment1->setNom('Batiment 1');

        $batiment2 = new Batiment();
        $batiment2->setId(2);
        $batiment2->setNom('Batiment 2');

        $personne->addBatiment($batiment1);
        $personne->addBatiment($batiment2);
        
        return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
            'personne' => $personne,
        ]);
    }
}
