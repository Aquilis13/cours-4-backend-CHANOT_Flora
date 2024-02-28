<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Personne;
use App\Entity\Batiment;

#[AsCommand(
    name: 'app:add-datas-in-bdd',
    description: 'Ajoute des données en BDD',
)]
class AddDatasInBDDCommand extends Command
{
    private EntityManagerInterface $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        
        /*-------------------------------------------------------------------------------------------
         *   ░█▀▀░█▀▄░█▀▀░█▀█░▀█▀░▀█▀░█▀█░█▀█░░░█▀▄░█░█░░░▀▀█░█▀▀░█░█░░░█▀▄░▀░█▀▀░█▀▀░█▀▀░█▀█░▀█▀
         *   ░█░░░█▀▄░█▀▀░█▀█░░█░░░█░░█░█░█░█░░░█░█░█░█░░░░░█░█▀▀░█░█░░░█░█░░░█▀▀░▀▀█░▀▀█░█▀█░░█░
         *   ░▀▀▀░▀░▀░▀▀▀░▀░▀░░▀░░▀▀▀░▀▀▀░▀░▀░░░▀▀░░▀▀▀░░░▀▀░░▀▀▀░▀▀▀░░░▀▀░░░░▀▀▀░▀▀▀░▀▀▀░▀░▀░▀▀▀
         --------------------------------------------------------------------------------------------*/
        //----------------------------------------------------
        // Création des bâtiments
        $batiment1 = new Batiment();
        $batiment1->setNom('Tour vide');

        $batiment2 = new Batiment();
        $batiment2->setNom('Manoir Nougat');

        $batiment3 = new Batiment();
        $batiment3->setNom('Château Chocolat');

        $batiment4 = new Batiment();
        $batiment4->setNom('Villa Vanille');

        // Enregistrement des batiments
        $this->entityManager->persist($batiment1);
        $this->entityManager->persist($batiment2);
        $this->entityManager->persist($batiment3);
        $this->entityManager->persist($batiment4);

        //----------------------------------------------------
        // Création des personnes
        $personne1 = new Personne();
        $personne1->setNom('Jean');
        $personne1->setPrenom('Michel');
        $personne1->addBatiment($batiment1);
        $personne1->addBatiment($batiment2);

        $personne2 = new Personne();
        $personne2->setNom('Marie');
        $personne2->setPrenom('Dupont');
        $personne2->addBatiment($batiment3);

        $personne3 = new Personne();
        $personne3->setNom('Paul');
        $personne3->setPrenom('Lefèvre');
        $personne3->addBatiment($batiment2);
        $personne3->addBatiment($batiment4);
        
        // Enregistrement des personnes
        $this->entityManager->persist($personne1);
        $this->entityManager->persist($personne2);
        $this->entityManager->persist($personne3);

        // Sauvegarde les enregistrements dans la BDD
        $this->entityManager->flush();
         
        // =====================================================================================

        $io->success("Jeu d'essai ajouter à la base de données !");

        return Command::SUCCESS;
    }
}
