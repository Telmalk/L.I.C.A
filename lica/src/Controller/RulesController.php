<?php

namespace App\Controller;

use App\Entity\Alien;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RulesController extends Controller
{
    /**
     * @Route("/rules", name="rules")
     */
    public function index()
    {
        return $this->render('rules/index.html.twig', [
            'controller_name' => 'RulesController',
            'title' => 'Règlements'
        ]);
    }
}
