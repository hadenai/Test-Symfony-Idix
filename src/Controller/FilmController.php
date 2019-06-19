<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\AddPersonaType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/film", name="film_")
 */
class FilmController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function addPersona(Request $request, ObjectManager $manager): Response
    {
        $Person = new Person();
        $form = $this->createForm(AddPersonaType::class, $Person);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $manager->persist($Person);
            $manager->flush();

            return $this->redirectToRoute('film_add');
        }
        return $this->render('film/addPerson.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
