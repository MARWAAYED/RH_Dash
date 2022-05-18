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
        //partie 1
        $employee = $manager->createQuery('SELECT SUM(e.no_of_employee) FROM App\Entity\Job e')->getSingleScalarResult();
        $applicant = $manager->createQuery('SELECT SUM(e.no_of_recruitment) FROM App\Entity\Job e')->getSingleScalarResult();
        $hired = $manager->createQuery('SELECT SUM(e.no_of_hired_employee) FROM App\Entity\Job e')->getSingleScalarResult();

        //job
        $job = $manager->createQuery('SELECT COUNT(j) FROM App\Entity\Job j')->getSingleScalarResult();

        //applicant
        //mailleur priopity
        $best_priority = $manager->createQuery('SELECT COUNT(a) FROM App\Entity\Applicant a WHERE (a.priority)=3')->getSingleScalarResult();
        //mauvaise priority
        $bad_priority = $manager->createQuery('SELECT COUNT(a) FROM App\Entity\Applicant a WHERE (a.priority)=0')->getSingleScalarResult();
        // nmoyenne des condidat avec priority 3
        $moy_best_priority = $manager->createQuery('SELECT AVG(a.priority) FROM App\Entity\Applicant a WHERE (a.priority)=3')->getSingleScalarResult();
        //mauvaise priority
        $moy_bad_priority = $manager->createQuery('SELECT AVG(a) FROM App\Entity\Applicant a WHERE (a.priority)=0')->getSingleScalarResult();
        
        $stage_id = $manager->createQuery('SELECT (a.stage) FROM App\Entity\Applicant a GROUP BY a.stage ')->getResult();
        $stage = $manager->createQuery('SELECT COUNT(a.stage) FROM App\Entity\Applicant a GROUP BY a.stage ')->getResult();
        $stage_name = $manager->createQuery('SELECT s.name FROM App\Entity\Stage s GROUP BY s.name ORDER BY s.id ')->getResult();
        
        $stage_id1=array_map('current',$stage_id);
        $stage1=array_map('current',$stage);
        $stage2=array_map('current',$stage_name); 
        //dump($stage2);
        
   
        //contract
        $contract = $manager->createQuery('SELECT COUNT(t) FROM App\Entity\Contract t')->getSingleScalarResult();
        //moyenne des salaires d'un mois
        $wage = $manager->createQuery('SELECT AVG(t.wage) as moy FROM App\Entity\Contract t')->getSingleScalarResult();
        //moyenne des salaires d'une annee
        $moy_wage_a = $manager->createQuery('SELECT (AVG(t.wage))*12 FROM App\Entity\Contract t')->getSingleScalarResult();
        //total des salaires d'un mois
        $tot_wage = $manager->createQuery('SELECT SUM(t.wage) FROM App\Entity\Contract t')->getSingleScalarResult();
        //total des salaires d'une annee
        $tot_wage_a = $manager->createQuery('SELECT (SUM(t.wage))*12 FROM App\Entity\Contract t')->getSingleScalarResult();
        
        //total des salaires par contract d'un mois
        $wage_contract = $manager->createQuery('SELECT t.state, SUM(t.wage) as wg FROM App\Entity\Contract t GROUP BY t.state')->getResult();
        //total des salaires par contract d'une année
        $an_wage_contract = $manager->createQuery('SELECT t.state, SUM(t.wage)*12 as wga FROM App\Entity\Contract t GROUP BY t.state')->getResult();

        //$wage_contract1=array_map('current',$wage_contract); 
        //$an_wage_contract1=array_map('current',$an_wage_contract); 
        dump($wage_contract);















        //employee
        $jobt = $manager->createQuery('SELECT e.job_title  FROM App\Entity\Employee e GROUP BY e.job_title')->getResult();
        $nbjob = $manager->createQuery('SELECT COUNT(e.job_title) FROM App\Entity\Employee e GROUP BY e.job_title')->getResult();
        $jobtitl = $manager->createQuery('SELECT e.job_title, COUNT(e) FROM App\Entity\Employee e GROUP BY e.job_title')->getResult();
        //$nbjobt = $manager->createQuery('SELECT e.job_title, AVG(e.id) FROM App\Entity\Employee e GROUP BY e.job_title')->getResult();

        //abscences
        //$moy_abbs = $manager->createQuery('SELECT l.private_name, AVG(l.number_of_days) FROM App\Entity\Leave l GROUP BY l.private_name')->getResult();
        //totale des jours d'abscences
        $total_days = $manager->createQuery('SELECT SUM(l.number_of_days) FROM App\Entity\Leave l ')->getSingleScalarResult();
        //moyenne des abscence totale
        $moy_abs_total = $manager->createQuery('SELECT AVG(l.number_of_days) FROM App\Entity\Leave l ')->getSingleScalarResult();
        //moyenne des abscence inferieur a 2 jours
        $moy_jour_2 = $manager->createQuery('SELECT AVG(l.number_of_days) FROM App\Entity\Leave l WHERE (l.number_of_days)<2 ')->getSingleScalarResult();
        //moyenne des abscences superieur a 2 jours
        $moy_jour_3 = $manager->createQuery('SELECT AVG(l.number_of_days) FROM App\Entity\Leave l WHERE (l.number_of_days)>3 ')->getSingleScalarResult();

        $type_abs = $manager->createQuery('SELECT l.private_name FROM App\Entity\Leave l Group by l.private_name ORDER BY l.private_name ')->getResult();
        $tot_abs = $manager->createQuery('SELECT SUM(l.number_of_days) FROM App\Entity\Leave l GROUP BY l.private_name ')->getResult();
        
        $type_abs1=array_map('current',$type_abs);
        $tot_abs1=array_map('current',$tot_abs);
        //dump($type_abs1);
        //dump($tot_abs);
        //autres
        //$stage = $manager->createQuery('SELECT s.name , ap.name FROM App\Entity\Stage s JOIN s.stage ap')->setMaxResults($applicant)->getResult();

        $job = $manager->createQuery('SELECT ap.name
            FROM App\Entity\Applicant ap 
            ORDER BY ap.job DESC
            ')->getResult();

        $job2 = $manager->createQuery('SELECT COUNT(ap.name) , j.name
        FROM App\Entity\Job j 
        JOIN j.job ap
        ')->setMaxResults($applicant)->getResult();


        $nbcancel = $manager->createQuery('SELECT c.state FROM App\Entity\Contract c  ORDER BY c.state ')->getResult();

        $nbcancelT = $manager->createQuery('SELECT c.state,COUNT(c.state) FROM App\Entity\Contract c  group BY c.state ')->getResult();
        
        $nameE = $manager->createQuery('SELECT c.name , c.state FROM App\Entity\Contract c   order BY c.state')->getResult();
            


        return $this->render('base.html.twig', [
            'stats' => Compact(
            'employee', 'applicant', 
            'hired', 'total_days', 
            'moy_abs_total', 'moy_jour_2', 
            'moy_jour_3', 'wage',
            'moy_wage_a', 'tot_wage',
            'tot_wage_a', 'best_priority',
            'bad_priority', 'moy_best_priority',
            'moy_bad_priority'
            ),
            'type_abs' => json_encode($type_abs1),
            'tot_abs' => json_encode($tot_abs1),
            'stage_id' => json_encode($stage_id1),
            'stage' => json_encode($stage1),
            'stage_name' => json_encode($stage2),
            'wage_contract' => $wage_contract,
            'an_wage_contract' => $an_wage_contract,
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
