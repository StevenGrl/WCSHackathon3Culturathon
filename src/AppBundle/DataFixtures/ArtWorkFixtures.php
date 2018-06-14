<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 04:03
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\ArtWork;
use AppBundle\Entity\Museum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArtWorkFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $artOne = new ArtWork();

        $artOne->setType($this->getReference('peinture'));
        $artOne->setTech($this->getReference('pinceau'));
        $artOne->setMaterials($this->getReference('toile'));
        $artOne->setName("Cable Car");
        $artOne->setArtist("Man&Pia");
        $artOne->setDescription("Représentation du pont de Brooklyn.");
        $artOne->setCoordX(0);
        $artOne->setCoordY(0);
        $dateOne = new \DateTime();
        $artOne->setDate($dateOne->setDate(2016,01,01));
        $artOne->setEnigma("Comment s'appellent les artistes ?");
        $artOne->setAnswer("Manolo et Pia");
        $artOne->setRoom($this->getReference('Salle 1'));
        $artOne->setPaint($this->getReference('huile'));
        $artOne->setMuseum($this->getReference('Louvre'));
        $artOne->setSizeH(12.7);
        $artOne->setSizeW(12.7);
        $manager->persist($artOne);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TechFixtures::class,
            MaterialsFixtures::class,
            TypeFixtures::class,
            PaintFixtures::class,
            MuseumFixtures::class,
            RoomFixtures::class
        ];
    }
}