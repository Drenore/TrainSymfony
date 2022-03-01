<?php

namespace App\Controller;

use App\Entity\Sujet;
use App\Form\SujetType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SujetController extends AbstractController
{
    /**
     * @Route("/sujet", name="app_sujet")
     */
    public function index(Request $request): Response
    {
        $sujet = new Sujet();
        $form = $this->createForm(SujetType::class, $sujet);
        $form->handleRequest($request);
        $manager = $this->getDoctrine()->getManager();
        $sujets = $manager->getRepository(Sujet::class)->findAll();
        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($sujet);
            $manager->flush();
            return $this->redirectToRoute('app_sujet');
        }
        return $this->render('sujet/index.html.twig', [
            'controller_name' => 'SujetController',
            'formSujet' => $form->createView(),
            'Sujets' => $sujets

        ]);
    }

     /**
     * @Route("/supprimerSujet/{id}", name="sup_sujet", methods={"GET","POST"})
     */
    public function supprimer($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $sujet = $manager->getRepository(Sujet::class)->find($id);
        $manager->remove($sujet);
        $manager->flush();
        return $this->redirectToRoute('app_sujet');
    }
    /**
     * @Route("/simulationCandidat/{motcle,score}", name="sup_sujet", methods={"GET","POST"})
     */
}
