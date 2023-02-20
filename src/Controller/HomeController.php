<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Repository\CompetenceRepository;
use App\Repository\ExperienceRepository;
use App\Repository\TechnologieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, ContactRepository $contactRepository, ExperienceRepository $experienceRepository, CompetenceRepository $competenceRepository, TechnologieRepository $technologieRepository): Response
    {
        // return $this->render('home/index.html.twig', [
        //     'controller_name' => 'HomeController',
        // ]);


        // Pour importer un form dans une autre page que celle initiallement prévue : je commente la fonction ci-dessus et j'importe la fonctionnalité du formulaire issue de Contactontroller/fonction new() et je pense bien à importer les parametres dans la fonction index() ainsi que les use correspondant.

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->save($contact, true);

            return $this->redirectToRoute('app_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('home/index.html.twig', [
            'contact' => $contact,
            'form' => $form,
            'experiences' => $experienceRepository->limitExperience(),
            'competences' => $competenceRepository->findAll(),
            'technologies' => $technologieRepository->findAll(),
        ]);
    }

    #[Route('/admin/logged', name: 'admin')]
    public function admin(): Response
    {
        return $this->render('main/admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}