<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class User extends Fixture
{
    private $encoder;
public function __construct(UserPasswordHasherInterface $encoder){
$this->encoder=$encoder;
}
public function load(ObjectManager $manager)
{
$roles=["ROLE_USER","ROLE_AC"];
$plainPassword = 'passer@123';
for ($i = 1; $i <=10; $i++) {
$user = new User();
$pos= rand(0,2);
$user->setNom('Nom '.$i);
$user->setPrenom('Prenom'.$i);
$user->setEmail(strtolower($roles[$pos])."@gmail.com".$i);
$encoded = $this->encoder->hashPassword($user,
$plainPassword);
$user->setPassword($encoded);
$user->setRoles([$roles[$pos]]);
$manager->persist($user);
$this->addReference("User".$i, $user);
}
$manager->flush();
}
}