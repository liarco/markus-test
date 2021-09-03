<?php

namespace App\Controller;

use App\Form\MyTestFormType;
use App\Form\PersonType;
use App\Repository\PersonRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

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

    /**
     * @Route("/person", name="person_test")
     */
    public function person(Request $request, EntityManagerInterface $manager, PersonRepository $personRepository): Response
    {
        $person = null;
        $form = $this->createForm(PersonType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $person = $form->getData();

            $manager->persist($person);
            $manager->flush();
        }

        return $this->render('test/person.html.twig', [
            'form' => $form->createView(),
            'person' => $person,
            'people' => $personRepository->findAll(),
        ]);
    }
}
