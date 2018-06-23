<?php

namespace App\Controller;

use App\Entity\Fight;
use App\Form\FightType;
use App\Repository\FightRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fight")
 */
class FightController extends Controller
{
    /**
     * @Route("/", name="fight_index", methods="GET")
     */
    public function index(FightRepository $fightRepository): Response
    {
        return $this->render('fight/index.html.twig', ['fights' => $fightRepository->findAll()]);
    }

    /**
     * @Route("/new", name="fight_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $fight = new Fight();
        $form = $this->createForm(FightType::class, $fight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fight);
            $em->flush();

            return $this->redirectToRoute('fight_index');
        }

        return $this->render('fight/new.html.twig', [
            'fight' => $fight,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fight_show", methods="GET")
     */
    public function show(Fight $fight): Response
    {
        return $this->render('fight/show.html.twig', ['fight' => $fight]);
    }

    /**
     * @Route("/{id}/edit", name="fight_edit", methods="GET|POST")
     */
    public function edit(Request $request, Fight $fight): Response
    {
        $form = $this->createForm(FightType::class, $fight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fight_edit', ['id' => $fight->getId()]);
        }

        return $this->render('fight/edit.html.twig', [
            'fight' => $fight,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fight_delete", methods="DELETE")
     */
    public function delete(Request $request, Fight $fight): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fight->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fight);
            $em->flush();
        }

        return $this->redirectToRoute('fight_index');
    }
}
