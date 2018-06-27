<?php
/**
 * Created by PhpStorm.
 * User: mallano
 * Date: 26/06/2018
 * Time: 15:36
 */

namespace App\Controller;

use App\Entity\Alien;
use App\Form\AlienType;
use App\Repository\AlienRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class bestiaireController extends Controller
{
    /**
     * @Route("/bestiaire", name="bestiaire")
     */
    public function index(AlienRepository $alienRepository): Response
    {
        $userID = $this->getUser();

        return $this->render('bestiaire/index.html.twig', [
            'controller_name' => 'BestiaireController',
            'title' => "Bestiaire",
            'aliens' => $alienRepository->findAll(),
            'userID' => $userID
        ]);
    }
}