<?php

namespace App\Controller;

use App\Form\MyTestFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="test")
     */
    public function index(): Response
    {
        $form = $this->createForm(MyTestFormType::class);

        return $this->render('test/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
