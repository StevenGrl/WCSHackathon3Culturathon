<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 03:33
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Materials;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class materialsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $bois = new Materials();
        $toile = new Materials();
        $marbre = new Materials();
        $bronze = new Materials();

        $bois->setName("Bois");
        $toile->setName("Toile");
        $marbre->setName("Marbre");
        $bronze->setName("Bronze");

        $manager->persist($bois);
        $manager->persist($toile);
        $manager->persist($marbre);
        $manager->persist($bronze);

        $manager->flush();
        
    }
}