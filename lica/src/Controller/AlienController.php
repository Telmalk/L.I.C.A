<?php

namespace App\Controller;

use App\Entity\Alien;
use App\Form\AlienType;
use App\Repository\AlienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/alien")
 */
class AlienController extends Controller
{
    /**
     * @Route("/", name="alien_index", methods="GET")
     */
    public function index(AlienRepository $alienRepository): Response
    {
        return $this->render('alien/index.html.twig', ['aliens' => $alienRepository->findAll()]);
    }

    /**
     * @Route("/new", name="alien_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $alien = new Alien();
        $form = $this->createForm(AlienType::class, $alien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($alien);
            $em->flush();

            return $this->redirectToRoute('alien_index');
        }

        return $this->render('alien/new.html.twig', [
            'alien' => $alien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="alien_show", methods="GET")
     */
    public function show(Alien $alien): Response
    {
        return $this->render('alien/show.html.twig', ['alien' => $alien]);
    }

    /**
     * @Route("/{id}/edit", name="alien_edit", methods="GET|POST")
     */
    public function edit(Request $request, Alien $alien): Response
    {
        $form = $this->createForm(AlienType::class, $alien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('alien_edit', ['id' => $alien->getId()]);
        }

        return $this->render('alien/edit.html.twig', [
            'alien' => $alien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="alien_delete", methods="DELETE")
     */
    public function delete(Request $request, Alien $alien): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alien->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($alien);
            $em->flush();
        }

        return $this->redirectToRoute('alien_index');
    }
}
