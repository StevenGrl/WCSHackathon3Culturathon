<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 03:33
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Materials;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MaterialsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $bois = new Materials();
        $toile = new Materials();
        $marbre = new Materials();
        $bronze = new Materials();

        $bois->setName("Bois");
        $toile->setName("Toile");
        $marbre->setName("Marbre");
        $bronze->setName("Bronze");
        $bois->setDescription('Il est possible de peindre le bois, qu’il s’agisse d’un meuble, d’une huisserie ou d’une pièce de menuiserie. Cette opération nécessite une préparation du support à peindre.

Le bois ne peut pas être peint directement : les surfaces en bois nécessitent d\'être poncées, nettoyées et recouvertes d\'un primaire (sous-couche) spécial bois.');
        $toile->setDescription('La toile est devenue le support le plus répandu pour la peinture à l\'huile, remplaçant progressivement la peinture sur bois. L\'une des premières peintures à l\'huile sur toile est une œuvre française, la Madone avec les anges réalisée vers 1410 et conservée au musée Gemäldegalerie à Berlin. Toutefois, la peinture sur panneau de bois a perduré jusqu\'au xvie siècle en Italie et au xviie siècle en Europe du nord. Le peintre Andrea Mantegna et des artistes vénitiens sont parmi ceux qui ont amené le changement1. La toile vénitienne était aisément disponible et considérée comme de meilleure qualité.');

        $marbre->setDescription('
Fin xviiie siècle, le marbre est une pierre calcaire ou carbonate de chaux à cassure grenue, extrêmement dure et solide, difficile à tailler, et qui reçoit le poli. Il y en a de différentes sortes : les unes sont d\'une seule couleur; d\'autres sont variées de diverses couleurs par veines, taches, mouchetures, ondes et nuagesE 2. Selon leur finition notamment, les marbres peuvent prendre différents noms:');
        $bronze->setDescription('Ces alliages ont été pour la première fois utilisés pendant la période précisément appelée « âge du bronze », pour fabriquer des outils, des armes, des instruments de musique et des armures plus robustes et résistants que leurs prédécesseurs en cuivre ou en pierre. Cette période s\'étend globalement de 3000 à 1000 av. J.-C., mais avec de grandes variations suivant les aires considérées.');
        $manager->persist($bois);
        $manager->persist($toile);
        $manager->persist($marbre);
        $manager->persist($bronze);

        $manager->flush();

        $this->addReference('bois', $bois);
        $this->addReference('toile', $toile);
        $this->addReference('marbre', $marbre);
        $this->addReference('bronze', $bronze);
    }
}