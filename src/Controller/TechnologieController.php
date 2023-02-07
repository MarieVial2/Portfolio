<?php

namespace App\Controller;

use App\Entity\Technologie;
use App\Form\TechnologieType;
use App\Repository\TechnologieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/technologie')]
class TechnologieController extends AbstractController
{
    #[Route('/', name: 'app_technologie_index', methods: ['GET'])]
    public function index(TechnologieRepository $technologieRepository): Response
    {
        return $this->render('technologie/index.html.twig', [
            'technologies' => $technologieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_technologie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TechnologieRepository $technologieRepository): Response
    {
        $technologie = new Technologie();
        $form = $this->createForm(TechnologieType::class, $technologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $technologieRepository->save($technologie, true);

            return $this->redirectToRoute('app_technologie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('technologie/new.html.twig', [
            'technologie' => $technologie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_technologie_show', methods: ['GET'])]
    public function show(Technologie $technologie): Response
    {
        return $this->render('technologie/show.html.twig', [
            'technologie' => $technologie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_technologie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Technologie $technologie, TechnologieRepository $technologieRepository): Response
    {
        $form = $this->createForm(TechnologieType::class, $technologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $technologieRepository->save($technologie, true);

            return $this->redirectToRoute('app_technologie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('technologie/edit.html.twig', [
            'technologie' => $technologie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_technologie_delete', methods: ['POST'])]
    public function delete(Request $request, Technologie $technologie, TechnologieRepository $technologieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$technologie->getId(), $request->request->get('_token'))) {
            $technologieRepository->remove($technologie, true);
        }

        return $this->redirectToRoute('app_technologie_index', [], Response::HTTP_SEE_OTHER);
    }
}
