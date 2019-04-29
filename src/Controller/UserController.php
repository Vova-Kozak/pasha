<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
//    public function index()
//    {
//        return $this->render('user/login.html.twig', [
//            'controller_name' => 'UserController',
//        ]);
//    }


    public function index()
{
    // вы можете извлечь EntityManager через $this->getDoctrine()
    // или вы можете добавить аргумент в ваше действие: index(EntityManagerInterface $em)
    $em = $this->getDoctrine()->getManager();

    $user = new User();
    $user->setUsername('Keyboard');
    $user->setPassword(19.99);
    $user->setDesk('Ergonomic and stylish!');
    $user->setEmail('Ergonomic and stylish!');
    $user->setBrowser('404');
    $user->setIP('0.0.0.0.01.101.10');

    // скажите Doctrine, что вы (в итоге) хотите сохранить Товар (пока без запросов)
    $em->persist($user);

    // на самом деле выполнить запросы (т.е. запрос INSERT)
    $em->flush();

    return new Response('Saved new product with id '.$user->getId());
}

    /**
     * @Route("/user/{id}", name="product_show")
     */
    public function showAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$user->getUsername());

        // или отобразить шаблон
        // в шаблоне, отобразить всё с {{ product.name }}
        // вернуть $this->render('product/show.html.twig', ['product' => $product]);
    }
}