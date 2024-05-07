<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\ORM\EntityManagerInterface;

class StudentController extends AbstractController


{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[IsGranted('ROLE_STUDENT')]
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        $projects = $this->entityManager->getRepository(Project::class)->findAll();

        return $this->render('student/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    #[Route('/student/select-project/{id}', name: 'app_student_select_project')]
    public function selectProject($id): Response
    {
        $project = $this->entityManager->getRepository(Project::class)->find($id);
        $project->setIsSelected(true);

        $this->entityManager->persist($project);
        $this->entityManager->flush();

        
        return $this->redirectToRoute('app_student');
    }

}
