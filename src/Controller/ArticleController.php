<?php
namespace App\Controller;
use App\Entity\UserReview;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
	public function homepage()
	{
	    $title = "Welcome!";
	    $info = "[
          'Another day another task... Another task another money.',
          'You can all you wont',
          'My English \"Pyorfect\" '
        ];";
	    return $this->render('task/homepage.html.twig',[
	        'title' => $title,
            'info' => $info,
        ]);
	}

    /**
     * @Route("/news/{slug}/", name="app_yop")
     */
	public function show($slug)
    {
//        return new Response(sprintf('Feature page: %s',
//            $slug
//        ));
        $user =[$username, $usertext];
        $username = [
            'One', 'People', 'Go', 'Codding'
        ];
        $usertext=[
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Vitae semper quis lectus nulla at volutpat diam.
        Tristique senectus et netus et malesuada fames ac turpis. Nunc mattis enim ut tellus.
        Odio ut enim blandit volutpat maecenas volutpat blandit aliquam.',
        ];

        $comments = [
          'Another day another task... Another task another money.',
          'You can all you wont',
          'My English "Pyorfect" '
        ];

//        dump($slug, $this);

        return $this->render('task/show.html.twig',[
            'title' =>ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
            'names' => $username,
            'text' => $usertext,
            'slug' => $slug,
            'user' => $user,
        ]);
    }

    /**
     * @Route("/new/comment", name="app_new_comment")
     *
     */

    public function new(Request $request)
    {
        //  создаёт задачу и задаёт в ней фиктивные данные для этого примера
        $title = 'Comment some';
        $ip = $_SERVER['REMOTE_ADDR'];
//        $browser = $_SERVER[‘HTTP_USER_AGENT’];

            $review = new UserReview();
        $form = $this->createFormBuilder($review)
            ->add('username', TextType::class)
            ->add('e_mail', EmailType::class)
            ->add('user_homepage', TextType::class)
            ->add('user_review', TextareaType::class)
            ->add('user_ip', HiddenType::class,[
                'data'=>$ip,
                ])
//            ->add('user_browser', HiddenType::class,[
//                'data'=>$browser,
//                ])

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

            return $this->redirectToRoute('app_new_comment');
        }


        return $this->render('task/add_review.html.twig', array(
            'form' => $form->createView(),
            'title' => $title,
            'ip' => $ip,
        ));


    }


}


