<?php

namespace App\Controller;

use App\Entity\Bet;
use App\Form\BetType;
use App\Repository\BetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bet")
 */
class BetController extends Controller
{
    /**
     * @Route("/", name="bet_index", methods="GET")
     */
    public function index(BetRepository $betRepository): Response
    {
        return $this->render('bet/index.html.twig', ['bets' => $betRepository->findAll()]);
    }

    /**
     * @Route("/new", name="bet_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $bet = new Bet();
        $form = $this->createForm(BetType::class, $bet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bet);
            $em->flush();

            return $this->redirectToRoute('bet_index');
        }

        return $this->render('bet/new.html.twig', [
            'bet' => $bet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bet_show", methods="GET")
     */
    public function show(Bet $bet): Response
    {
        return $this->render('bet/show.html.twig', ['bet' => $bet]);
    }

    /**
     * @Route("/{id}/edit", name="bet_edit", methods="GET|POST")
     */
    public function edit(Request $request, Bet $bet): Response
    {
        $form = $this->createForm(BetType::class, $bet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bet_edit', ['id' => $bet->getId()]);
        }

        return $this->render('bet/edit.html.twig', [
            'bet' => $bet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bet_delete", methods="DELETE")
     */
    public function delete(Request $request, Bet $bet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bet->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bet);
            $em->flush();
        }

        return $this->redirectToRoute('bet_index');
    }
}
