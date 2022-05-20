<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListRecrutementController extends AbstractController
{
    /**
     * @Route("/recrutement", name="recrutement")
     * @Security("is_granted('ROLE_USER')")
     */
    public function index(EntityManagerInterface $manager): Response
    {
        //applicant
        $t_applicant = $manager->createQuery('SELECT a.name, a.create_date, a.partner_name, s.name 
                                            FROM App\Entity\Applicant a
                                            JOIN a.stage s  
                                            ORDER BY a.priority DESC')->getResult();

        $t_applicant_job = $manager->createQuery('SELECT a.name
                                                FROM App\Entity\Applicant a
                                                ORDER BY a.priority DESC')->getResult();


        $t_applicant_number = $manager->createQuery('SELECT COUNT(a) FROM App\Entity\Applicant a ')->getResult();
        
        $t_applicant_number1=array_map('current',$t_applicant_number); 
        

        
        $t_state = $manager->createQuery('SELECT s.id, s.name FROM App\Entity\Stage s ')->getResult();
        $t_state1=array_map('current',$t_state);

        dump($t_applicant);

        return $this->render('list_recrutement/recrutement.html.twig', [

            't_applicant' => $t_applicant,
            't_state' => $t_state,
            't_applicant_job' => $t_applicant_job,


            'controller_name' => 'ListRecrutementController',
        ]);
    }
}
