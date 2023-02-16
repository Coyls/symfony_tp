<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/account', name: 'account')]
class AccountController extends AbstractController
{
    #[Route('/settings', name: 'settings')]
    public function index(): Response
    {
        return $this->render('account/settings.html.twig');
    }
}