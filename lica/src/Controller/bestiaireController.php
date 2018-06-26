<?php
/**
 * Created by PhpStorm.
 * User: mallano
 * Date: 26/06/2018
 * Time: 15:36
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class bestiaireController extends Controller
{
    /**
     * @Route("/bestiaire", name="bestiaire")
     */
    public function index()
    {
        return $this->render('bestiaire/index.html.twig', [
            'controller_name' => 'BestiaireController',
            'title' => "Bestiaire"
        ]);
    }
}