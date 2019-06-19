<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListFilmController extends AbstractController
{
    /**
     * @Route("/", name="list_film")
     */
    public function index(FilmRepository $repo) :Response
    {
        $films = $repo->findAll();

        return $this->render('film/index.html.twig', [
            'films' => $films
        ]);
    }
    /**
     * @Route("/film/{id}", name="film_show")
     */
    public function show(Film $film) :Response
    {

        return $this->render('film/show.html.twig', [
            'film' => $film,
        ]);
    }
}
