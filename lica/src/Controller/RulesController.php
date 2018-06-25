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
        $id = 1;

        $em = $this->container->get("doctrine.orm.default_entity_manager");
        $entities = $em->getRepository(Alien::class)->findBy([
            "user" => $id,
        ]);
        return $this->render('rules/index.html.twig', [
            'controller_name' => 'RulesController',
            'request' => $entities,
        ]);
    }
}
