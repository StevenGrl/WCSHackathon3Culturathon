<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 03:42
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tableau = new Type();
        $photo = new Type();
        $sculpture = new Type();
        $fresque = new Type();
        $objet = new Type();

        $tableau->setName("Tableau");
        $photo->setName("Photo");
        $sculpture->setName("Sculpture");
        $fresque->setName("Fresque");
        $objet->setName("Objet");

        $manager->persist($tableau);
        $manager->persist($photo);
        $manager->persist($sculpture);
        $manager->persist($fresque);
        $manager->persist($objet);

        $manager->flush();
    }
}