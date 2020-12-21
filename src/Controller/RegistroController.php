<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\User;


class RegistroController extends AbstractController
{
    /**
     * @Route("/registro", name="registro")
     */
    public function index(Request $request,UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new Usuarioconip();
        $em = $this->getDoctrine()->getEntityManager();//registrar
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $user->setPassowrd($passwordEncoder->encodePassword($user,$form['password']->getdata()));
            $em->persist($user);
            $em->flush();
            $this->addflash('Existe','registro exitoso');


        }



        return $this->render('registro/index.html.twig', [
            'controller_name' => 'RegistroController',
            'formulario'=>$form->createView()

        ]);


    }




}
