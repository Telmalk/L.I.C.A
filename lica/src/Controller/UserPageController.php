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

        //var_dump($user->getBirthdate()->format('Y-m-d'));exit;
        //echo $user->getBirthdate()->format('Y-m-d');exit;

        return $this->render('userPage/index.html.twig', [
            'controller_name' => 'UserPageController',
            'title' => "Profil",
            'userId' => $user->getId(),
            'userPseudo' => $user->getPseudo(),
            'userBirthdate' => $user->getBirthdate()->format('d/m/Y'),
            'userNbCredit' => $user->getNbCredit(),
            'userMail' => $user->getMail(),
            'userWin' => $user->getWin(),
            'userDefeat' => $user->getDefeat()
        ]);
    }
}