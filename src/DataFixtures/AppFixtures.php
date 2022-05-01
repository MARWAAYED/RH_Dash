<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    //injection de dependance 
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder =$encoder;
    }

    public function load(ObjectManager $manager): void
    {
       $faker = Factory::create('FR-fr');
       
       //utilisateurs
       $users = [];

       for($i=1;$i <=10;$i++ ){
            $user = new User();

            $hash = $this->encoder->encodePassword($user, 'password');

            $user->setName($faker->name)
                ->setEmail($faker->email)
                ->setHash($hash);


            $manager->persist($user);
            $users[] = $user;

       }



        $manager->flush();
    }
}
