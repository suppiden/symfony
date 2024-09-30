<?php

namespace App\Controller;

use App\Entity\Profesores;
use App\Form\ProfesoresType;
use App\Repository\ProfesoresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profesores")
 */
class ProfesoresController extends AbstractController
{
    /**
     * @Route("/", name="app_profesores_index", methods={"GET"})
     */
    public function index(ProfesoresRepository $profesoresRepository): Response
    {
        return $this->render('profesores/index.html.twig', [
            'profesores' => $profesoresRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profesores_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfesoresRepository $profesoresRepository): Response
    {
        $profesor = new Profesores();
        $form = $this->createForm(ProfesoresType::class, $profesor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profesoresRepository->add($profesor, true);

            return $this->redirectToRoute('app_profesores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profesores/new.html.twig', [
            'profesore' => $profesor,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_profesores_show", methods={"GET"})
     */
    public function show(Profesores $profesor): Response
    {
        return $this->render('profesores/show.html.twig', [
            'profesor' => $profesor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profesores_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Profesores $profesor, ProfesoresRepository $profesoresRepository): Response
    {
        $form = $this->createForm(ProfesoresType::class, $profesor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profesoresRepository->add($profesor, true);

            return $this->redirectToRoute('app_profesores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profesores/edit.html.twig', [
            'profesor' => $profesor,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_profesores_delete", methods={"POST"})
     */
    public function delete(Request $request, Profesores $profesores, ProfesoresRepository $profesoresRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profesores->getId(), $request->request->get('_token'))) {
            $profesoresRepository->remove($profesores, true);
        }

        return $this->redirectToRoute('app_profesores_index', [], Response::HTTP_SEE_OTHER);
    }
}
