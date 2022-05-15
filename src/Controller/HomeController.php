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

        $contract = $manager->createQuery('SELECT COUNT(c) FROM App\Entity\Contract c')->getSingleScalarResult();
        
        dump($contract);
        
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
