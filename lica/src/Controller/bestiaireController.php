<?php
/**
 * Created by PhpStorm.
 * User: mallano
 * Date: 26/06/2018
 * Time: 15:36
 */

namespace App\Controller;

use App\Entity\User;
use App\Entity\Alien;
use App\Form\AlienType;
use App\Repository\AlienRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class bestiaireController
 * @package App\Controller
 * @Route("bestiaire")
 */
class bestiaireController extends Controller
{
    /**
     * @Route("", name="bestiaire_index")
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

    /**
     * @param $id
     * @param $price
     * @Route("/adopt/{id}/{price}", methods="GET|POST" )
     * @return Response
     */
    public function adopt(int $id, int $price): Response
    {
        $userID = $this->getUser();
        $em = $this->getDoctrine()
            ->getManager();
        $alien = $em->getRepository(Alien::class)
            ->find($id);
        $user = $em->getRepository(User::class)
            ->find($userID);
        $nbCreditUser = $user->getNbCredit();
        if ($nbCreditUser < $price) {
            return $this->redirect('/bestiaire');
        } else {
            $user->setNbCredit($nbCreditUser - $price);
        }
        $alien->setUser($user);
        $alien->setAdopted(true);
        $em->flush();
        return $this->redirect('/userPage');
    }

}