<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlienController extends Controller
{
    /**
     * @Route("/alien", name="alien")
     */
    public function index()
    {
        return $this->render('alien/index.html.twig', [
            'controller_name' => 'AlienController',
        ]);
    }
}
