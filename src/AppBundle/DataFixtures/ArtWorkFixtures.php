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
            $art_mp1 = new ArtWork();
            $art_mp1_2 = new ArtWork();
            $art_cogniet = new ArtWork();
            $art_loire = new ArtWork();
            $art_nyc = new ArtWork();
            $art_myst = new ArtWork();
            $art_mp6 = new ArtWork();
            $art_loire2 = new ArtWork();

            $art_cogniet->setType($this->getReference('peinture'));
            $art_cogniet->setTech($this->getReference('pinceau'));
            $art_cogniet->setMaterials($this->getReference('toile'));
            $art_cogniet->setPaint($this->getReference('huile'));
            $art_cogniet->setTime($this->getReference('contemporain'));
            $art_cogniet->setTile($this->getReference('tile7'));
            $art_cogniet->setName("Cable Car");
            $art_cogniet->setArtist($this->getReference('cognet'));
            $art_cogniet->setDescription("Episode de la campagne d’Egypte – Bataille d’Héliopolis le 20 mars 1800");
            $art_cogniet->setCoordX(0);
            $art_cogniet->setCoordY(0);
            $dateHeight = new \DateTime();
            $art_cogniet->setDate($dateHeight->setDate(1837, 01, 01));
            $art_cogniet->setEnigma("Comment s'appellent les artistes ?");
            $art_cogniet->setAnswer("Léon COGNIET");
            $art_cogniet->setMuseum($this->getReference('fas'));
            $art_cogniet->setSizeH(12.7);
            $art_cogniet->setSizeW(9.7);
            $art_cogniet->setStyle($this->getReference('impressionnisme'));
            $art_cogniet->setLongDescription('Paysage Urbain, encadrement caisse américaine en bois beige.');
            $art_cogniet->setImage('11.jpeg');

            $art_mp1_2->setType($this->getReference('peinture'));
            $art_mp1_2->setTech($this->getReference('pinceau'));
            $art_mp1_2->setMaterials($this->getReference('toile'));
            $art_mp1_2->setPaint($this->getReference('acrylique'));
            $art_mp1_2->setTime($this->getReference('contemporain'));
            $art_mp1_2->setTile($this->getReference('tile7'));
            $art_mp1_2->setName("Cable Car");
            $art_mp1_2->setArtist($this->getReference('mnp'));
            $art_mp1_2->setDescription("Représentation du pont de Brooklyn.");
            $art_mp1_2->setCoordX(0);
            $art_mp1_2->setCoordY(0);
            $dateSeven = new \DateTime();
            $art_mp1_2->setDate($dateSeven->setDate(2016, 01, 01));
            $art_mp1_2->setEnigma("Comment s'appellent les artistes ?");
            $art_mp1_2->setAnswer("Manolo et Pia");
            $art_mp1_2->setPaint($this->getReference('acrylique'));
            $art_mp1_2->setMuseum($this->getReference('fas'));
            $art_mp1_2->setSizeH(12.7);
            $art_mp1_2->setSizeW(9.7);
            $art_mp1_2->setStyle($this->getReference('impressionnisme'));
            $art_mp1_2->setLongDescription('Paysage Urbain, encadrement caisse américaine en bois beige.');
            $art_mp1_2->setImage('1.jpeg');

            $art_mp1->setType($this->getReference('peinture'));
            $art_mp1->setTech($this->getReference('pinceau'));
            $art_mp1->setMaterials($this->getReference('toile'));
            $art_mp1->setPaint($this->getReference('acrylique'));
            $art_mp1->setTime($this->getReference('contemporain'));
            $art_mp1->setTile($this->getReference('tile0'));
            $art_mp1->setName("Cable Car");
            $art_mp1->setArtist($this->getReference('mnp'));
            $art_mp1->setDescription("Représentation du pont de Brooklyn.");
            $art_mp1->setCoordX(0);
            $art_mp1->setCoordY(0);
            $dateOne = new \DateTime();
            $art_mp1->setDate($dateOne->setDate(2016, 01, 01));
            $art_mp1->setEnigma("Comment s'appellent les artistes ?");
            $art_mp1->setAnswer("Manolo et Pia");
            $art_mp1->setPaint($this->getReference('acrylique'));
            $art_mp1->setMuseum($this->getReference('fas'));
            $art_mp1->setSizeH(12.7);
            $art_mp1->setSizeW(9.7);
            $art_mp1->setStyle($this->getReference('impressionnisme'));
            $art_mp1->setLongDescription('Paysage Urbain, encadrement caisse américaine en bois beige.');
            $art_mp1->setImage('1.jpeg');

            $art_mp6->setType($this->getReference('peinture'));
            $art_mp6->setTech($this->getReference('pinceau'));
            $art_mp6->setMaterials($this->getReference('toile'));
            $art_mp6->setPaint($this->getReference('acrylique'));
            $art_mp6->setTime($this->getReference('contemporain'));
            $art_mp6->setTile($this->getReference('tile1'));
            $art_mp6->setName("MP-006");
            $art_mp6->setArtist($this->getReference('mnp'));
            $art_mp6->setDescription("Représentation d'un écorché.");
            $art_mp6->setCoordX(0);
            $art_mp6->setCoordY(0);
            $dateTwo = new \DateTime();
            $art_mp6->setDate($dateTwo->setDate(2015, 01, 01));
            $art_mp6->setEnigma("Comment s'appellent les artistes ?");
            $art_mp6->setAnswer("Manolo et Pia");
            $art_mp6->setPaint($this->getReference('acrylique'));
            $art_mp6->setMuseum($this->getReference('fas'));
            $art_mp6->setSizeH(12.7);
            $art_mp6->setSizeW(9.7);
            $art_mp6->setStyle($this->getReference('impressionnisme'));
            $art_mp6->setLongDescription('encadrement caisse américaine en bois beige.');
            $art_mp6->setImage('5.jpeg');

            $art_myst->setType($this->getReference('photo'));
            $art_myst->setTech($this->getReference('argentique'));
            $art_myst->setTime($this->getReference('contemporain'));
            $art_myst->setTile($this->getReference('tile2'));
            $art_myst->setName("Mystère");
            $art_myst->setArtist($this->getReference('manolo'));
            $art_myst->setDescription("Dassault Mystère IV A : Chasseur de 1955 (il a aussi été utilisé par la Patrouille de France à l'époque), il précède le Mirage III");
            $art_myst->setCoordX(0);
            $art_myst->setCoordY(0);
            $dateThree = new \DateTime();
            $art_myst->setDate($dateThree->setDate(2013, 01, 01));
            $art_myst->setEnigma("Comment s'appellent les artistes ?");
            $art_myst->setAnswer("Manolo");
            $art_myst->setMuseum($this->getReference('fas'));
            $art_myst->setSizeH(9);
            $art_myst->setSizeW(12);
            $art_myst->setStyle($this->getReference('impressionnisme'));
            $art_myst->setLongDescription('Le Dassault MD-454 Mystère IV était un chasseur de jour français des années 1950, qui connut une longue carrière en France, où il resta en service jusqu\'en 1982. De nombreux exemplaires ont été exportés en Inde et en Israël.
Le premier Mystère IV A est réceptionné par la 12e escadre de Cambrai le 25 mai 1955. C\'est sur cette base qu\'est formée une première patrouille acrobatique dotée du nouvel avion. Le 14 juillet 1955, douze de ces appareils défilent au-dessus des Champs-Élysées. À partir de la fin 1955, six escadres de chasse sont équipées du Mystère IV A). De 1957 à 1964, il a été la monture de la Patrouille de France. 
Les derniers Mystère IV terminent leur carrière à la 8e Escadre de Chasse de Cazaux, où ils assurent le perfectionnement des futurs pilotes de combat. Leur retrait définitif, après presque 30 ans de service, intervient au mois de novembre 1982, lors de la conversion de la 8e Escadre sur Alpha Jet.');
            $art_myst->setImage('9.jpeg');

        $art_nyc->setType($this->getReference('photo'));
        $art_nyc->setTech($this->getReference('argentique'));
        $art_nyc->setTime($this->getReference('contemporain'));
        $art_nyc->setTile($this->getReference('tile3'));
        $art_nyc->setName("NYC");
        $art_nyc->setArtist($this->getReference('manolo'));
        $art_nyc->setDescription("Dassault Mystère IV A : Chasseur de 1955 (il a aussi été utilisé par la Patrouille de France à l'époque), il précède le Mirage III");
        $art_nyc->setCoordX(0);
        $art_nyc->setCoordY(0);
        $dateThree = new \DateTime();
        $art_nyc->setDate($dateThree->setDate(2014, 01, 01));
        $art_nyc->setEnigma("Comment s'appellent les artistes ?");
        $art_nyc->setAnswer("Manolo");
        $art_nyc->setMuseum($this->getReference('fas'));
        $art_nyc->setSizeH(16.0);
        $art_nyc->setSizeW(10.6);
        $art_nyc->setStyle($this->getReference('impressionnisme'));
        $art_nyc->setLongDescription('Le Dassault MD-454 Mystère IV était un chasseur de jour français des années 1950, qui connut une longue carrière en France, où il resta en service jusqu\'en 1982. De nombreux exemplaires ont été exportés en Inde et en Israël.
Le premier Mystère IV A est réceptionné par la 12e escadre de Cambrai le 25 mai 1955. C\'est sur cette base qu\'est formée une première patrouille acrobatique dotée du nouvel avion. Le 14 juillet 1955, douze de ces appareils défilent au-dessus des Champs-Élysées. À partir de la fin 1955, six escadres de chasse sont équipées du Mystère IV A). De 1957 à 1964, il a été la monture de la Patrouille de France. 
Les derniers Mystère IV terminent leur carrière à la 8e Escadre de Chasse de Cazaux, où ils assurent le perfectionnement des futurs pilotes de combat. Leur retrait définitif, après presque 30 ans de service, intervient au mois de novembre 1982, lors de la conversion de la 8e Escadre sur Alpha Jet.');
        $art_nyc->setImage('10.jpeg');

        $art_loire->setType($this->getReference('peinture'));
        $art_loire->setTech($this->getReference('pinceau'));
        $art_loire->setMaterials($this->getReference('toile'));
        $art_loire->setPaint($this->getReference('acrylique'));
        $art_loire->setTime($this->getReference('contemporain'));
        $art_loire->setTile($this->getReference('tile4'));
        $art_loire->setName("");
        $art_loire->setArtist($this->getReference('mnp'));
        $art_loire->setDescription("Représentation d'une berge de la Loire un soir d'été");
        $art_loire->setCoordX(0);
        $art_loire->setCoordY(0);
        $dateFive = new \DateTime();
        $art_loire->setDate($dateFive->setDate(2014, 01, 01));
        $art_loire->setEnigma("Comment s'appellent les artistes ?");
        $art_loire->setAnswer("Manolo et Pia");
        $art_loire->setPaint($this->getReference('acrylique'));
        $art_loire->setMuseum($this->getReference('fas'));
        $art_loire->setSizeH(8.0);
        $art_loire->setSizeW(8.0);
        $art_loire->setStyle($this->getReference('impressionnisme'));
        $art_loire->setLongDescription('encadrement caisse américaine en bois beige.');
        $art_loire->setImage('3.jpeg');

        $art_loire2->setType($this->getReference('peinture'));
        $art_loire2->setTech($this->getReference('pinceau'));
        $art_loire2->setMaterials($this->getReference('toile'));
        $art_loire2->setPaint($this->getReference('acrylique'));
        $art_loire2->setTime($this->getReference('contemporain'));
        $art_loire2->setTile($this->getReference('tile5'));
        $art_loire2->setName("");
        $art_loire2->setArtist($this->getReference('mnp'));
        $art_loire2->setDescription("Représentation d'une berge de la Loire un soir d'été");
        $art_loire2->setCoordX(0);
        $art_loire2->setCoordY(0);
        $dateSix = new \DateTime();
        $art_loire2->setDate($dateSix->setDate(2014, 01, 01));
        $art_loire2->setEnigma("Comment s'appellent les artistes ?");
        $art_loire2->setAnswer("Manolo et Pia");
        $art_loire2->setPaint($this->getReference('acrylique'));
        $art_loire2->setMuseum($this->getReference('fas'));
        $art_loire2->setSizeH(8.0);
        $art_loire2->setSizeW(8.0);
        $art_loire2->setStyle($this->getReference('impressionnisme'));
        $art_loire2->setLongDescription('encadrement caisse américaine en bois beige.');
        $art_loire2->setImage('3.jpeg');


        $manager->persist($art_mp1);
            $manager->persist($art_mp1_2);
            $manager->persist($art_cogniet);
            $manager->persist($art_loire);
            $manager->persist($art_nyc);
            $manager->persist($art_myst);
            $manager->persist($art_mp6);
            $manager->persist($art_loire2);

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