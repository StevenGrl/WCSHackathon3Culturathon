<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 14/06/18
 * Time: 18:53
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $mnp = new Artist();

        $mnp->setName("Man&Pia");
        $mnp->setDescription("Man&Pia est un duo d'artistes formé par Manolo et Pia, qui se sont rencontrés 
        en 1987 aux Arts appliqués Olivier de Serres à Paris. Lui est créateur graphique et photographe,
         elle, architecte d'intérieur et plasticienne. Ensemble, ils fondent un studio de design graphique en 1996
          et développent un procédé de photographie plastique novateur qui leur permet de faire de nombreuses 
          expositions en France et à l'étranger. En parallèle de leur activité de design, Manolo et Pia ont 
          également un atelier dans lequel ils peignent à quatre mains. Ils réalisent des oeuvres à l'acrylique
           sur toile représentant principalement des paysages aux tons chauds et automnaux 
           dans un style figuratif et stylisé.");

        $manager->persist($mnp);

        $manager->flush();

        $this->addReference('mnp', $mnp);
    }
}