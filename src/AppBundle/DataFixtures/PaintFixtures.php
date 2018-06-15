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
        $eau = new Paint();
        $aquarelle = new Paint();

        $acrylique->setName('Acrylique');
        $eau->setName('Eau');
        $aquarelle->setName('Aquarelle');

        $manager->persist($acrylique);
        $manager->persist($aquarelle);
        $manager->persist($eau);

        $manager->flush();

        $this->addReference('acrylique', $acrylique);
        $this->addReference('eau', $eau);
        $this->addReference('aquarelle', $aquarelle);
    }
}