<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;


class UrlsController extends AbstractController
{
    #[Route('/', name: 'app_urls_create')]
    public function create(Request $request): Response
    {
       $form = $this->createFormBuilder()
            ->add('original', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Enter the url to shortener here'
                ],
                'constraints' => [
                    new NotBlank(['message' =>'You must enter an Url.']),
                    new Url(['message' => 'Url entered is invalid.'])
                ]
            ])
            ->getForm()
       ;

       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()){

       }

        return $this->render('urls/create.html.twig', [
            'controller_name' => 'UrlsController',
            'form' => $form->createView()
        ]);
    }
}
