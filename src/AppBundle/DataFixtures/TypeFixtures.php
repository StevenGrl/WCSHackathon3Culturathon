<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 03:42
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $peinture = new Type();
        $photo = new Type();
        $sculpture = new Type();
        $fresque = new Type();
        $objet = new Type();

        $peinture->setName("Peinture");
        $photo->setName("Photo");
        $sculpture->setName("Sculpture");
        $fresque->setName("Fresque");
        $objet->setName("Objet");

        $peinture->setDescription('Les plus anciennes peintures connues à ce jour se trouvent dans la grotte Chauvet, en France, et elles ont, selon la plupart des historiens, environ trente-deux mille ans. Gravées et peintes avec de l\'ocre rouge et un colorant noir, elles représentent surtout des animaux avec des chevaux, des rhinocéros, des lions, des buffles et des hommes. On trouve d\'autres exemples de peinture rupestre partout dans le monde, en France, en Espagne, au Portugal, en Chine, en Australie, etc.

');
        $photo->setDescription('La photographie est une technique qui permet de créer des images sans l\'action de la main, par l\'action de la lumière.

Le terme « photographie » désigne aussi l\'image obtenue, phototype1 (photographie visible et stable qu\'elle soit négative ou positive, qu\'on obtient après l\'exposition et le traitement d\'une couche sensible) ou non.

La photographie est le regroupement des techniques d\'enregistrement des rayonnements électromagnétiques, réalisé par des procédés photochimiques.');
        $sculpture->setDescription('
Sculpture en ronde-bosse : David de Michel-Ange.
La sculpture est une activité artistique qui consiste à concevoir et réaliser des formes en volume, en relief, soit en ronde-bosse (statuaire), en haut-relief, en bas-relief, par modelage, par taille directe, par soudure ou assemblage. Le terme de sculpture désigne également l\'objet résultant de cette activité.');
        $fresque->setDescription('

 Fresque de Cimabue à Assise (Italie)

Fresque de la Chapelle Sainte-Anne à Lingenau (Konrad Honold)

L\'hôtel de ville de Mulhouse est un exemple particulièrement impressionnant de l\'utilisation de la fresque en peinture murale extérieure

Fresques blasonnées de l\'église Notre-Dame du Sablon de Bruxelles
Le terme vient de l\'italien « affresco » qui signifie « dans le frais ». La fresque est une technique particulière de peinture murale dont la réalisation s\'opère sur un enduit appelé intonaco, avant qu\'il ne soit sec.

Le fait de peindre sur un enduit qui n\'a pas encore séché permet aux pigments de pénétrer dans la masse, et donc aux couleurs de durer plus longtemps qu\'une simple peinture en surface sur un substrat. Son exécution nécessite une grande habileté, et se fait très rapidement, entre la pose de l\'enduit et son séchage complet.');
        $objet->setDescription('L\'hôtel de ville de Mulhouse est un exemple particulièrement impressionnant de l\'utilisation de la fresque en peinture murale extérieure

Fresques blasonnées de l\'église Notre-Dame du Sablon de Bruxelles
Le terme vient de l\'italien « affresco » qui signifie « dans le frais ». La fresque est une technique particulière de peinture murale dont la réalisation s\'opère sur un enduit appelé intonaco, avant qu\'il ne soit sec.
');
        $manager->persist($peinture);
        $manager->persist($photo);
        $manager->persist($sculpture);
        $manager->persist($fresque);
        $manager->persist($objet);

        $manager->flush();

        $this->addReference('peinture', $peinture);
        $this->addReference('photo', $photo);
        $this->addReference('sculpture', $sculpture);
        $this->addReference('fresque', $fresque);
        $this->addReference('objet', $objet);
    }
}