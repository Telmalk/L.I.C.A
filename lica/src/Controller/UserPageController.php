<?php
/**
 * Created by PhpStorm.
 * User: mallano
 * Date: 26/06/2018
 * Time: 12:06
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\User;
use App\Entity\Alien;

class UserPageController extends Controller
{
    /**
     * @Route("/userPage", name="userPage")
     */
    public function index()
    {
        $userID = $this->getUser();

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($userID);

        $entityManagerAlien = $this->getDoctrine()->getManager();
        $alien = $entityManagerAlien->getRepository(Alien::class)->findAll();

        //var_dump($alien[0]->getUser()->getId());exit;
        $alienOfUser = [];
        for ($i = 0; $i < count($alien); $i++) {
            if ($alien[$i]->getUser()->getId() === $user->getId()) {
                $alienOfUser[] = $alien[$i];
            }
        }

        return $this->render('userPage/index.html.twig', [
            'controller_name' => 'UserPageController',
            'title' => "Profil",
            'userId' => $user->getId(),
            'userPseudo' => $user->getPseudo(),
            'userBirthdate' => $user->getBirthdate()->format('d/m/Y'),
            'userNbCredit' => $user->getNbCredit(),
            'userMail' => $user->getMail(),
            'userWin' => $user->getWin(),
            'userDefeat' => $user->getDefeat(),
            'userDescription' => $user->getDescription(),
            'alienOfUser' => $alienOfUser
        ]);
    }
}