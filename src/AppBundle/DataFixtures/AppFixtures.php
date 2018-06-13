<?php
/**
 * Created by PhpStorm.
 * User: Steven(génie) et Clément(abruti)
 * Date: 24/05/18
 * Time: 17:48
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Tile;
use AppBundle\Entity\Finder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tiles = [
            ['wall', 'wall', 'wall', 'wall', 'wall', 'wall', 'wall'],
            ['oeuvre', 'floor', 'floor', 'floor', 'floor', 'floor', 'oeuvre'],
            ['wall', 'floor', 'oeuvre','floor', 'oeuvre', 'floor', 'wall'],
            ['wall', 'floor', 'floor','floor', 'floor', 'floor', 'wall'],
            ['wall', 'floor', 'floor','floor', 'floor', 'floor', 'wall'],
            ['wall', 'floor', 'oeuvre','floor', 'oeuvre', 'floor', 'wall'],
            ['oeuvre', 'floor', 'floor','floor', 'floor', 'floor', 'oeuvre'],
            ['wall', 'wall', 'wall', 'door', 'wall', 'wall', 'wall']
        ];

        // create 20 products! Bam!
        $types = ['sea', 'sea', 'sea', 'sea', 'island', 'island', 'port'];

        foreach ($tiles as $y => $line) {
            foreach ($line as $x => $type) {
                $tile = new Tile();
                $tile->setType($type);
                $tile->setCoordX($x);
                $tile->setCoordY($y);
                $manager->persist($tile);
            }
        }

        $finder = new Finder();
        $finder->setCoordX(4);
        $finder->setCoordY(8);
        $finder->setName('Sherlock');
        $manager->persist($finder);

        $manager->flush();
    }
}
