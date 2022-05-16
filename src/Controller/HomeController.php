<?php

namespace App\Controller;

use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * Undocumented function
     *@Route("/" , name="homepage")
     *
     */
    public function home(EntityManagerInterface $manager){

        $employee = $manager->createQuery('SELECT COUNT(e) FROM App\Entity\Employee e')->getSingleScalarResult();
        $applicant = $manager->createQuery('SELECT COUNT(ap) FROM App\Entity\Applicant ap')->getSingleScalarResult();

        //dump($employee ,$applicant);

        $job = $manager->createQuery('SELECT COUNT(j) FROM App\Entity\Job j')->getSingleScalarResult();
        $contract = $manager->createQuery('SELECT COUNT(t) FROM App\Entity\Contract t')->getSingleScalarResult();

        $wage = $manager->createQuery('SELECT AVG(t.wage) as moy FROM App\Entity\Contract t')->getSingleScalarResult();
        
        $jobt = $manager->createQuery('SELECT e.job_title  FROM App\Entity\Employee e GROUP BY e.job_title')->getResult();
        
        $jobtitl = $manager->createQuery('SELECT e.job_title, COUNT(e) FROM App\Entity\Employee e GROUP BY e.job_title')->getResult();

        $nbjobt = $manager->createQuery('SELECT e.job_title, AVG(e.id) FROM App\Entity\Employee e GROUP BY e.job_title')->getResult();

        $moy_abbs = $manager->createQuery('SELECT l.private_name, AVG(l.number_of_days) FROM App\Entity\Leave l GROUP BY l.private_name')->getResult();

        $nbjour = $manager->createQuery('SELECT AVG(l.number_of_days) FROM App\Entity\Leave l WHERE (l.number_of_days)<2 ')->getResult();
        
        $nbj = $manager->createQuery('SELECT AVG(l.number_of_days) FROM App\Entity\Leave l WHERE (l.number_of_days)>3 ')->getResult();

        $moyjob = $manager->createQuery('SELECT COUNT(e.job_title) FROM App\Entity\Employee e GROUP BY e.job_title')->getResult();

        $MOY = $manager->createQuery('SELECT Avg(COUNT(ap.name)) FROM App\Entity\Applicant ap GROUP BY ap.stage')->getResult();


        dump($MOY);
        
        return $this->render('base.html.twig', [
            'stats' => Compact('employee', 'applicant')
        ]);
    }


    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
