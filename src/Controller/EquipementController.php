<?php

namespace App\Controller;

use App\Repository\EquipementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class EquipementController extends AbstractController
{
    /**
     * @var Environment
     */
    private Environment $twig;

    public function __construct (Environment $twig) {
        $this->twig = $twig;
    }

    #[Route('/equipement', name: 'equipement_index', methods: ['GET'])]
    public function index(EquipementRepository $equipementRepository): Response
    {
        return new Response($this->twig->render('equipement/index.html.twig', [
            'equipements' => $equipementRepository->findAll(),
        ]));
    }
}
