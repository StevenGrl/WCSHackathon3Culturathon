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
        $louvre = new Museum();
        $louvre->setName('Louvre');
        $louvre->setCity('Paris');
        $louvre->setLogo('https://i0.wp.com/www.grapheine.com/wp-content/uploads/2016/04/provisoire-louvre-logo.jpg?w=800&ssl=1');
        $manager->persist($louvre);
        $manager->flush();

        $this->addReference('Louvre', $louvre);
    }
}