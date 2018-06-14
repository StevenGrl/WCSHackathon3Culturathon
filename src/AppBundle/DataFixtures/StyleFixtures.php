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
        $impressionnisme = new Style();
        $impressionnisme->setName('impressionnisme');
        $impressionnisme->setDescription('
Impression, soleil levant (1872), toile de Claude Monet, qui a donné son nom à l\'impressionnisme.
L’impressionnisme est un mouvement pictural né de l\'association d\'artistes de la seconde moitié du xixe siècle vivant en France. Fortement critiqué à ses débuts, ce mouvement se manifeste notamment de 1874 à 1886 par des expositions publiques à Paris, et marqua la rupture de l\'art moderne avec la peinture académique.

Ce mouvement pictural est principalement caractérisé par des tableaux de petit format, des traits de pinceau visibles, la composition ouverte, l\'utilisation d\'angles de vue inhabituels, une tendance à noter les impressions fugitives, la mobilité des phénomènes climatiques et lumineux, plutôt que l\'aspect stable et conceptuel des choses, et à les reporter directement sur la toile. L\'impressionnisme eut une grande influence sur l\'art de cette époque, la peinture bien sûr, mais aussi les arts visuels (sculpture1, photographie impressionniste dont le pictorialisme est le relais, cinéma impressionniste), la littérature2 et la musique3.');
        $manager->persist($impressionnisme);

        $manager->flush();

        $this->addReference('impressionnisme', $impressionnisme);
    }
}