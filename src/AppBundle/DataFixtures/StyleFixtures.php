<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 14/06/18
 * Time: 21:12
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Style;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StyleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contemporain = new Style();
        $contemporain->setName('contemporain');
        $contemporain->setDescription('L’Homme de Vitruve de Léonard de Vinci est pour beaucoup le symbole de l\'évolution de la civilisation occidentale durant la Renaissance artistique.

Cornelis Aerentsz van der Dussen de Jan van Scorel, (vers 1535) peinture sur bois, Weiss Gallery, Londres.

Dessin de cerveau dans le De humani corporis fabrica de André Vésale.
La Renaissance est une période de l\'époque moderne associée à la redécouverte de la littérature, de la philosophie et des sciences de l\'Antiquité, qui a pour point de départ la Renaissance italienne. En effet, la Renaissance naquit à Florence (en Italie) grâce aux artistes qui pouvaient y exprimer librement leur art : une Pré-Renaissance se produisit dans plusieurs villes d\'Italie dès les xiiie et xive siècles (Duecento et Trecento), se propagea au xve siècle dans la plus grande partie de l\'Italie, en Espagne, dans certaines enclaves d\'Europe du Nord et d\'Allemagne, sous la forme de ce que l\'on appelle la Première Renaissance (Quattrocento), puis gagna l\'ensemble de l\'Europe au xvie siècle (Cinquecento). On parle de Renaissance artistique au sens où les œuvres de cette époque ne s\'inspirent plus du Moyen Âge mais de l\'art gréco-romain.');
        $manager->persist($contemporain);

        $manager->flush();

        $this->addReference('contemporain', $contemporain);
    }
}