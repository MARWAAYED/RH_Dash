<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TablesController extends AbstractController
{
    /**
     * @Route("/tables", name="tables")
     */
    public function index(EntityManagerInterface $manager): Response
    {

        //employee
        $t_emp = $manager->createQuery('SELECT e.name, e.job_title, e.work_email FROM App\Entity\Employee e  ORDER BY e.name')->getResult();


        //les contract
        $t_contract = $manager->createQuery('SELECT c.name,c.date_start, c.date_end, c.wage, c.state FROM App\Entity\Contract c  ORDER BY c.state ')->getResult();

        //applicant
        $t_applicant = $manager->createQuery('SELECT a.name, a.create_date, a.priority, a.partner_name, s.name 
                                            FROM App\Entity\Applicant a
                                            JOIN a.stage s  
                                            ORDER BY a.priority DESC')->getResult();

        $t_applicant_job = $manager->createQuery('SELECT a.name
                                                FROM App\Entity\Applicant a
                                                ORDER BY a.priority DESC')->getResult();


        $t_applicant_number = $manager->createQuery('SELECT COUNT(a) FROM App\Entity\Applicant a ')->getResult();
        
        $t_applicant_number1=array_map('current',$t_applicant_number); 
        

        //applicant
        $t_state = $manager->createQuery('SELECT s.id, s.name FROM App\Entity\Stage s ')->getResult();
        $t_state1=array_map('current',$t_state);

        dump($t_applicant);


        return $this->render('tables/index.html.twig', [
            't_emp' => $t_emp,
            't_contract' => $t_contract,
            't_applicant' => $t_applicant,
            't_state' => $t_state,
            't_applicant_job' => $t_applicant_job,


            'controller_name' => 'TablesController',
        ]);
    }
}
