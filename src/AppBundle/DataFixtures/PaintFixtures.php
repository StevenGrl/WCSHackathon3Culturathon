<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 14/06/18
 * Time: 10:07
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Paint;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PaintFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $acrylique = new Paint();
        $eau = new Paint();
        $aquarelle = new Paint();

        $acrylique->setName('Acrylique');
        $eau->setName('Eau');
        $aquarelle->setName('Aquarelle');

        $acrylique->setDescription('La principale qualité de la peinture acrylique est sa docilité : dilution à l\'eau (sans excès), miscibilité, mélanges faciles à préparer, facilité d\'application, polyvalence de supports, faible odeur. Elle est très solide et indélébile.

Elle a la particularité de sécher très vite, en quelques minutes. C\'est un avantage lorsqu\'il s\'agit de travailler plus rapidement les différentes couches, mais peut constituer un inconvénient en empêchant les retouches. Aujourd\'hui, on peut trouver des acryliques à séchage ralenti (d\'une heure à plusieurs jours).');
        $eau->setDescription('L\'expression peinture à l\'eau désigne populairement, dans le domaine des beaux-arts, l’aquarelle et la gouache, peintures comportant des pigments et un liant à la gomme arabique. Dans ces deux cas, le mot désigne aussi bien le matériau coloré qui se dilue à l\'eau, la technique d\'application et l\'œuvre. En principe, l\'aquarelle est transparente, tandis que la gouache est couvrante.');
        $aquarelle->setDescription('
Aquarelle de J. Grandgagnage, 1988.
L’aquarelle est une technique picturale fondée sur l\'utilisation de pigments broyés, agglutinés avec de l\'eau gommée pour constituer une peinture à l\'eau également appelée aquarelle, ainsi que les ouvrages de peintures réalisées par ce procédé. Elle se pratique généralement sur papier.

Depuis la fin du xviiie siècle, on différencie l\'aquarelle, transparente, de la gouache, opaque.

Le faible encombrement du matériel et la possibilité d\'une exécution technique rapide la font souvent servir à la réalisation de pochades et d\'études, et à la peinture en extérieur.');
        $manager->persist($acrylique);
        $manager->persist($aquarelle);
        $manager->persist($eau);

        $manager->flush();

        $this->addReference('acrylique', $acrylique);
        $this->addReference('eau', $eau);
        $this->addReference('aquarelle', $aquarelle);
    }
}