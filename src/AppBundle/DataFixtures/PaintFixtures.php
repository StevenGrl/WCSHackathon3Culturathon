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
        $acrylique = new Paint();
        $huile = new Paint();
        $aquarelle = new Paint();

        $acrylique->setName('acrylique');
        $huile->setName('huile');
        $aquarelle->setName('aquarelle');

        $manager->persist($acrylique);
        $manager->persist($aquarelle);
        $manager->persist($huile);

        $manager->flush();

        $this->addReference('acrylique', $acrylique);
        $this->addReference('huile', $huile);
        $this->addReference('aquarelle', $aquarelle);
    }
}