<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 21:51
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Time;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TimeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contemporain = new Time();


        $contemporain->setPeriod('à partir de 1945');
        $contemporain->setDescription('La notion de « contemporanéité » est d’abord une notion historique.
         Selon cette approche, la période contemporaine commencerait à partir de 19456,
          avec la fin de la Seconde Guerre mondiale et, par commodité, la plupart des études traitent
           de la période qui débute en 1945 et va jusqu\'à aujourd\'hui.');

        $manager->persist($contemporain);

        $manager->flush();

        $this->addReference('contemporain', $contemporain);
    }
}