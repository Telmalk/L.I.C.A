<?php
/**
 * Created by PhpStorm.
 * User: mallano
 * Date: 26/06/2018
 * Time: 15:38
 */

namespace App\Controller;

use App\Entity\Fight;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class fightPageController extends Controller
{
    /**
     * @Route("/fightPage", name="fightPage")
     */
    public function index()
    {
        $em = $this->getDoctrine()
            ->getManager();
        $test = $em->getRepository(Fight::class)
            ->findAll();

        $figths = [];
        $waitFights = [];
        $i = 0;
        while($i < sizeof($test)) {
            if ($test[$i]->getUser2() !== null && $test[$i]->getAlien2() != null) {
                $figths[] = [
                    "userName1" => $test[$i]->getUser1()->getPseudo(),
                    "userName2" => $test[$i]->getUser2()->getPseudo(),
                    "alienName1" => $test[$i]->getAlien1()->getName(),
                    "alienName2" => $test[$i]->getAlien2()->getName(),
                    "alienOdd1" => $test[$i]->getOddFighter1(),
                    "alienOdd2" => $test[$i]->getOddFighter2(),
                    "imgAlien1" => $test[$i]->getAlien1()->getImg(),
                    "date" => $test[$i]->getDate()->format("d/n/Y"),
                    "target" => $test[$i]->getId()
                ];
            } else {
                $waitFights[] = [
                    "userName1" => $test[$i]->getUser1()->getPseudo(),
                    "alienName1" => $test[$i]->getAlien1()->getName(),
                    "alienOdd1" => $test[$i]->getOddFighter1(),
                    "date" => $test[$i]->getDate()->format("d/n/Y")
                ];
            }
            $i++;
      }
      return $this->render('fightPage/index.html.twig', [
          'controller_name' => 'FightPageController',
          'title' => "Paris",
          "fights" => $figths,
          "waitFight" => $waitFights
        ]);
    }
}