<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 04:03
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\ArtWork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArtWorkFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 9; $i++) {
            $art = new ArtWork();
            $art->setType($this->getReference('peinture'));
            $art->setTech($this->getReference('pinceau'));
            $art->setMaterials($this->getReference('toile'));
            $art->setPaint($this->getReference('acrylique'));
            $art->setTime($this->getReference('contemporain'));
            $art->setName("Cable Car");
            $art->setArtist($this->getReference('mnp'));
            $art->setDescription("Représentation du pont de Brooklyn.");
            $art->setCoordX(0);
            $art->setCoordY(0);
            $dateOne = new \DateTime();
            $art->setDate($dateOne->setDate(2016, 01, 01));
            $art->setEnigma("Comment s'appellent les artistes ?");
            $art->setAnswer("Manolo et Pia");
            $art->setPaint($this->getReference('acrylique'));
            $art->setMuseum($this->getReference('fas'));
            $art->setSizeH(12.7);
            $art->setSizeW(9.7);
            $art->setStyle($this->getReference('impressionnisme'));
            $art->setLongDescription('Paysage Urbain, encadrement caisse américaine en bois beige.');
            $art->setImage($i.'.jpeg');
            $manager->persist($art);
        }
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
            RoomFixtures::class,
            ArtistFixtures::class,
        ];
    }
}