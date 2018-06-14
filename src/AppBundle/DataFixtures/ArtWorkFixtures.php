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
        $artOne->setLongDescription('La peinture sur panneaux de bois s’est répandue à l’époque romane, sous l’influence de la peinture d’icônes byzantine. Vers le milieu du xiiie siècle, l’art médiéval et la peinture gothique sont devenus plus réalistes, avec un début d’intérêt pour la représentation des volumes et de la perspective, en Italie avec Cimabue puis son pupille Giotto di Bondone. Avec Giotto, le traitement de la composition par les meilleurs peintres est devenu beaucoup plus libre et innovateur. Giotto et Cimabue sont considérés comme les deux grands maîtres de la peinture médiévale dans la culture occidentale. Cimabue, dans la tradition byzantine, avait une approche plus réaliste et plus dramatique de son art, alors que Giotto a développé ces innovations à un plus haut niveau ce qui a d’ailleurs jeté les bases de la peinture classique occidentale. Les deux artistes étaient donc les pionniers du naturalisme.');
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