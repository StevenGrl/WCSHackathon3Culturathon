<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 14/06/18
 * Time: 10:11
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Museum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MuseumFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $fas = new Museum();
        $fas->setName('French Art Studio');
        $fas->setCity('Londre');
        $fas->setLogo('http://www.frenchartstudio.com/images/frenchstudio-logo-white.gif');
        $manager->persist($fas);
        $manager->flush();

        $this->addReference('fas', $fas);
    }
}