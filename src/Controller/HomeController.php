<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_home')]
class HomeController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(LinkRepository $linkRepository): Response
    {
        $links = $linkRepository->findAll();
        return $this->render('home/index.html.twig', [
            'links' => $links,
        ]);
    }
}