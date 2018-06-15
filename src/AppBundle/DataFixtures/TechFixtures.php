<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 03:47
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Tech;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TechFixtures extends Fixture
{
    public  function load(ObjectManager $manager)
    {
        $couteau = new Tech();
        $pinceau = new Tech();
        $numerique = new Tech();
        $argentique = new Tech();
        $taille = new Tech();
        $modelage = new Tech();

        $couteau->setName("Couteau");
        $pinceau->setName("Pinceau");
        $numerique->setName("Numerique");
        $argentique->setName("Argentique");
        $taille->setName("Taille");
        $modelage->setName("Modelage");

        $couteau->setDescription('
Couteau à peindre

Peinture au couteau à peindre

Différentes formes de couteaux à peindre
Le couteau à peindre est utilisé en peinture comme outil pictural pour étaler la peinture épaisse sur la toile et/ou travailler l\'œuvre par empâtements. On parle de peinture au couteau.

Selon la forme de la lame, il permet de déposer les touches de peinture à un endroit précis. Il peut remplacer la brosse ou le pinceau. La pâte doit être épaisse et dense : huile ou acrylique, pures ou additionnées de médium.');
        $pinceau->setDescription('
Pinceaux de différents poils, tailles et formes.

Pinceau de maquillage.

Pinceau de maquillage.
Le pinceau (du latin peniculus, petite queue) est un instrument de peinture, de dessin et d\'écriture composé d\'un manche ou hampe (en bois ou plastique) munie à son extrémité d\'une touffe de poils maintenue grâce à une virole. Avant l\'apparition de la virole métallique, les poils étaient maintenus grâce à une plume ligaturée par du fil en laiton : on trouve ces pinceaux, très populaires, sous l\'appellation de pinceau \'monté sur plume\'.');
        $numerique->setDescription('Le mot « numérique » est « en train de devenir un mot passe-partout qui sert à définir un ensemble de pratiques qui caractérisent notre quotidien et dont nous avons peut-être encore du mal à saisir la spécificité2 ». Gérard Berry, constatant que le mot « numérique » a supplanté le mot « informatique » dans le discours politique et dans les médias, estime que pourtant « on ne peut comprendre le monde numérique dans sa totalité sans comprendre suffisamment ce qu’est son cœur informatique »11.');
        $argentique->setDescription('Le terme « argentique » s’est répandu au début des années 2000 quand le besoin s\'est fait sentir de classique, sur pellicule, de la photographie dite « numérique » en plein essor.

Emprunté au vocabulaire de la chimie, il fait référence aux minuscules agrégats d’argent qui constituent les images produites selon ce procédé.');
        $taille->setDescription('L\'étude de l\'histoire de la taille de pierre est primordiale pour déterminer la datation d\'un bâtiment1. En effet, la distribution géographique des techniques de taille des différentes pierres permet non seulement d’esquisser l’évolution des techniques de taille sur tout le territoire étudié, mais aussi de définir des zones d’innovations, de migrations, d’interactions, de transferts technologiques.');
        $modelage->setDescription('
Enfant qui façonne une jarre.
Le modelage est une technique de sculpture qui se pratique sur des matières malléables, principalement des terres plastiques comme l\'argile, la terre glaise, les pâtes à modeler, la cire, les pâtes-autodurcissantes. On pratique aussi le modelage sur la cire. Le modelage permet d\'obtenir des formes par façonnage, en utilisant des outils comme des ébauchoirs et des spatules et aussi par le simple emploi des mains. Il existe plusieurs techniques de modelage, on peut par exemple obtenir une forme en retirant ou en ajoutant de la matière, ou en déformant le matériau.');

        $manager->persist($couteau);
        $manager->persist($pinceau);
        $manager->persist($numerique);
        $manager->persist($argentique);
        $manager->persist($taille);
        $manager->persist($modelage);

        $manager->flush();

        $this->addReference('couteau', $couteau);
        $this->addReference('pinceau', $pinceau);
        $this->addReference('numerique', $numerique);
        $this->addReference('argentique', $argentique);
        $this->addReference('taille', $taille);
        $this->addReference('modelage', $modelage);
    }
}