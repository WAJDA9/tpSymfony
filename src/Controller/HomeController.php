<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
       
        if ($this->getUser()) {
            
            return $this->render('home/home_authenticated.html.twig');
        } else {
           
            return $this->render('home/home_guest.html.twig');
        }
    }
}
