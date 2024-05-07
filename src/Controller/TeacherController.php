<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Form\ProjectType;
class TeacherController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[IsGranted('ROLE_TEACHER')]
    #[Route('/teacher', name: 'app_teacher')]
    public function index(): Response
    {
        $projects = $this->entityManager->getRepository(Project::class)->findAll();

        return $this->render('teacher/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    #[IsGranted('ROLE_TEACHER')]
    #[Route('/teacher/create', name: 'app_teacher_create')]
    public function create(): Response
    {
        return $this->render('teacher/create.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }

    #[IsGranted('ROLE_TEACHER')]
    #[Route('/teacher/modify/{id}', name: 'app_teacher_modify')]
    public function modify($id, Request $request): Response
    {
        $project = $this->entityManager->getRepository(Project::class)->find($id);
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('app_teacher');
        }

        return $this->render('teacher/modify.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    #[IsGranted('ROLE_TEACHER')]
    #[Route('/teacher/delete/{id}', name: 'app_teacher_delete')]
    public function delete($id): Response
    {
        $project = $this->entityManager->getRepository(Project::class)->find($id);
        $entityManager = $this->entityManager;
        $entityManager->remove($project);
        $entityManager->flush();

        return $this->redirectToRoute('app_teacher');
    }
}
