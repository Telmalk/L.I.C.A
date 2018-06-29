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
use App\Entity\Bet;
use App\Entity\Fight;

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

        $entityManagerBet = $this->getDoctrine()->getManager();
        $bet = $entityManagerBet->getRepository(Bet::class)->findAll();

        $entityManagerFight = $this->getDoctrine()->getManager();
        $fight = $entityManagerFight->getRepository(Fight::class)->findAll();

        $alienOfUser = [];
        for ($i = 0; $i < count($alien); $i++) {
            if ($alien[$i]->getUser()) {
                if ($alien[$i]->getUser()->getId() === $user->getId()) {
                    $alienOfUser[] = $alien[$i];
                }
            }
        }

        $betOfUser = [];
        for ($i = 0; $i < count($bet); $i++) {
            if ($bet[$i]->getIdUser()) {
                if ($bet[$i]->getIdUser()->getId() === $user->getId()) {
                    $idFight = $bet[$i]->getIdFight()->getId();
                    $fight = $entityManagerFight->getRepository(Fight::class)->find($idFight);
                    $betOfUser[] = [
                      "userPseudo1" => $fight->getUser1()->getPseudo(),
                      "alienName1" => $fight->getAlien1()->getName(),
                      "oddFighter1" => $fight->getOddFighter1(),
                      "userPseudo2" => $fight->getUser2()->getPseudo(),
                      "alienName2" => $fight->getAlien2()->getName(),
                      "oddFighter2" => $fight->getOddFighter2(),
                      "date" => $fight->getDate()->format('d/m/Y'),
                      "betTarget" => $bet[$i]->getBetTarget(),
                      "wager" => $bet[$i]->getWager()
                    ];
                }
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
            'alienOfUser' => $alienOfUser,
            'betOfUser' => $betOfUser
        ]);
    }
}