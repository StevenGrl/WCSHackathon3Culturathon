<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 03:47
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Tech;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TechFixtures extends Fixture
{
    public  function load(ObjectManager $manager)
    {
        $couteau = new Tech();
        $pinceau = new Tech();
        $numerique = new Tech();
        $argentique = new Tech();
        $taille = new Tech();
        $modelage = new Tech();

        $couteau->setName("Couteau");
        $pinceau->setName("Pinceau");
        $numerique->setName("Numerique");
        $argentique->setName("Argentique");
        $taille->setName("Taille");
        $modelage->setName("Modelage");

        $manager->persist($couteau);
        $manager->persist($pinceau);
        $manager->persist($numerique);
        $manager->persist($argentique);
        $manager->persist($taille);
        $manager->persist($modelage);

        $manager->flush();
    }
}