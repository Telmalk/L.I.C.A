<?php

namespace App\Controller;

use App\Entity\Fight;
use App\Entity\User;
use App\Entity\Bet;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/bet", name="bet")
 */
class BetsController extends Controller
{
    /**
     * @Route("", name="bet")
     */
    public function index()
    {
        return $this->render('bet/index.html.twig', [
            'controller_name' => 'BetController',
        ]);
    }

    /**
     * @param $target
     * @param Request $request
     * @Route("/addbet/{target}/{id}", methods="GET|POST")
     */
    public function addBet($target, $id, Request $request)
    {
        $bet = new Bet();
        $wager = $request->request->getInt("wager");
        dump($wager);
        $userId = $this->getUser();
        $em = $this->getDoctrine()
            ->getManager();
        $user = $em->getRepository(User::class)
            ->find($userId);
        if ($user->getNbCredit() < $wager) {
            return $this->redirect("/fightPage");
        } else {
            $user->setNbCredit($user->getNbCredit() - $wager);
        }
        $fight = $em->getRepository(Fight::class)
            ->find($id);
        $bet->setIdUser($user);
        $bet->setIdFight($fight);
        $bet->setBetTarget($target);
        $bet->setWager($wager);
        $em->persist($bet);
        $em->flush();
        return $this->redirect('/userPage');
    }
}
