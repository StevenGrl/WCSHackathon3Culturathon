<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 14/06/18
 * Time: 10:07
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Paint;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PaintFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $huile = new Paint();
        $eau = new Paint();
        $aquarelle = new Paint();
        $huile->setName('huile');
        $eau->setName('eau');
        $aquarelle->setName('aquarelle');

        $manager->persist($huile);
        $manager->persist($aquarelle);
        $manager->persist($eau);

        $manager->flush();

        $this->addReference('huile', $huile);
        $this->addReference('eau', $eau);
        $this->addReference('aquarelle', $aquarelle);
    }
}