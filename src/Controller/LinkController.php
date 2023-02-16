<?php

namespace App\Controller;

use App\Entity\Link;
use App\Repository\LinkRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/link')]

class LinkController extends AbstractController
{

    #[Route('', name: 'index', methods: ["GET"])]
    public function Index(LinkRepository $linkRepository): Response
    {

        /* for ($i = 0; $i < 40; $i++) {
        $link = new Link();
        $link->setTitle("test" . $i);
        $link->setUrl("http://perdu.com");
        $linkRepository->save($link, true);
        } */

        $links = $linkRepository->findAll();
        return $this->render('link/index.html.twig', [
            'links' => $links,
        ]);
    }

    #[Route('/{link}', name: 'show', methods: ["GET"])]
    public function show(Link $link): Response
    {
        return $this->render('link/link.html.twig', [
            'link' => $link,
        ]);
    }

    #[Route('/{link}/delete', name: 'delete_link', methods: ["GET"])]
    public function delete(LinkRepository $linkRepository, Link $link): Response
    {

        $linkRepository->remove($link, true);

        return new RedirectResponse("/link");
    }
}