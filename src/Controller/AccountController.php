<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;

class AccountController extends AbstractController
{
    /**
     * connecter
     * @Route("/login", name="account_login")
     * @return Response
     */
    public function login(AuthenticationUtils $utils): Response
    {
        $error =$utils->getLastAuthenticationError();
        $username = $utils->getLastUsername();
       
        return $this->render('account/login.html.twig',[
            'hasError' => $error !== null,
            'username'=>$username
        ]);
    }

    /**
     * deconnecter
     *
     * @Route("/logout", name="account_logout")
     * 
     * @return void
     */
    public function logout(){

    }

    /**
     * insription
     *
     * @Route("/register", name="account_register")
     * 
     * @return Response
     */
    public function register(Request $request, EntityManagerInterface $manager, 
    UserPasswordEncoderInterface $encoder){
        $user = new User();

        $form =$this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ){
            //crypter mot de passe
            $hash = $encoder->encodePassword($user, $user->getHash());
            $user->setHash($hash);

            $manager->persist($user);
            $manager->flush();

            $this->addFlash(
                'success',
                "Votre compte a été bien crée , vous pouvez maintenant vous connecter"
            );

            return $this->redirectToRoute('account_login');


        }

        return $this->render('account/registration.html.twig',[
            'form' =>$form->createView()
        ]);

    }



}
