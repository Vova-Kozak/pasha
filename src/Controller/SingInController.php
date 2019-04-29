<?php


namespace App\Controller;


use App\Entity\User;
use http\Env\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SingInController extends AbstractController
{
    /**
     * @Route("/sing/in", name="app_sin")
     *
     */


    public function sin(){
        $title = "Sign in";
        $info = [
            'Another day another task... Another task another money.',
            'You can all you wont',
            'My English "Pyorfect" '
        ];


        return $this->render('task/sing_in.html.twig',[
            'title' => $title,
            'info' => $info,
        ]);

    }
    /**
     * @Route("/sing/ini", name="app_sini")
     *
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$product->getId()  );

        // или отобразить шаблон
        // в шаблоне, отобразить всё с {{ product.name }}
        // вернуть $this->render('product/show.html.twig', ['product' => $product]);
    }
    /**
     * @Route("/sing/in1", name="sssin")
     *
     */

    public function new(Request $request)
    {
        //  создаёт задачу и задаёт в ней фиктивные данные для этого примера
        $title = '';
        $usin = new User();

        $form = $this->createFormBuilder($usin)
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->add('email', EmailType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // но первоначальная переменная `$task` тоже была обновлена
            $task = $form->getData();
            // ... . выполните действия, такие как сохранение задачи в базе данных
            // например, если Task является сущностью Doctrine, сохраните его!
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('sssin');
        }


        return $this->render('task/test.html.twig', array(
            'form' => $form->createView(),
            'title' => $title,
        ));
    }






}
