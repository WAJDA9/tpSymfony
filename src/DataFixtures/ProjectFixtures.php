<?php

namespace App\DataFixtures;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $project= new Project();
        $project->setName('Projet 1');
        $project->setDuration(10);
        $project->setPreRequis('Pré-requis 1');
        $project->setContent('Contenu 1');
        $project->setIsSelected(false);
        $manager->persist($project);

        $manager->flush();
    }
}
