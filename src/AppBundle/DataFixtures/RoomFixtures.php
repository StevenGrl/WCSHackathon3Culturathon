<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 14/06/18
 * Time: 10:19
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Room;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RoomFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $room1 = new Room();
        $room2 = new Room();
        $room3 = new Room();
        $room4 = new Room();
        $room1->setName('Salle 1');
        $room2->setName('Salle 2');
        $room3->setName('Salle 3');
        $room4->setName('Salle 4');
        $room1->setTheme('contemporain');
        $room2->setTheme('Grece Antique');
        $room3->setTheme('Pop Art');
        $room4->setTheme('Photo');

        $manager->persist($room1);
        $manager->persist($room2);
        $manager->persist($room3);
        $manager->persist($room4);

        $manager->flush();

        $this->addReference('Salle 1', $room1);
        $this->addReference('Salle 2', $room2);
        $this->addReference('Salle 3', $room3);
        $this->addReference('Salle 4', $room4);

    }
}