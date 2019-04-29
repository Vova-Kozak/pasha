<?php


namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SingUpController extends AbstractController
{

    public function rrr() {
        return new Response('something');
    }


    /**
     * @Route("/sing/up", name="app_sup")
     *
     */


    public function sup(){
        $title = "Sign up";
        $info = [
            'Another day another task... Another task another money.',
            'You can all you wont',
            'My English "Pyorfect" '
        ];

        return $this->render('task/sing_up.html.twig',[
            'title' => $title,
            'info'  => $info,]);
    }
}