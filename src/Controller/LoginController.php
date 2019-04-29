<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $errors = $authenticationUtils -> getLastAuthenticationError();

        $lastUsername = $authenticationUtils -> getLastUsername();

        return $this->render('login/login.html.twig', [
            'controller_name' => 'LoginController',
            'errors' => $errors,
            'username'=> $lastUsername,
        ]);
    }
}
