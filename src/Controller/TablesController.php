<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TablesController extends AbstractController
{
    /**
     * @Route("/tables", name="tables")
     * @Security("is_granted('ROLE_USER')")
     * 
     */
    public function index(EntityManagerInterface $manager): Response
    {

        //employee
        $t_emp = $manager->createQuery('SELECT e.name, e.job_title, e.work_email FROM App\Entity\Employee e  ORDER BY e.name')->getResult();


        //les contract
        $t_contract = $manager->createQuery('SELECT c.name,c.date_start, c.date_end, c.wage, c.state FROM App\Entity\Contract c  ORDER BY c.state ')->getResult();

        


        return $this->render('tables/index.html.twig', [
            't_emp' => $t_emp,
            't_contract' => $t_contract,
            


            'controller_name' => 'TablesController',
        ]);
    }
}
