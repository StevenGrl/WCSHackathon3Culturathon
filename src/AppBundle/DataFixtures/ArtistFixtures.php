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
        $this->addReference('mnp', $mnp);

        $cognet = new Artist();

        $cognet->setName("Léon COGNIET");
        $cognet->setDescription("Léon Cogniet a largement contribué au musée d’Histoire de France fondé 
        à Versailles par Louis-Philippe, avec notamment les commandes de La Bataille du Thabor (aujourd’hui déposé à Orléans) et La 
        bataille d’Héliopolis, toujours à Versailles. ");

        $manager->persist($cognet);
        $manager->flush();
        $this->addReference('cognet', $cognet);

        $manolo = new Artist();

        $manolo->setName("Manolo Chrétien");
        $manolo->setDescription("Manolo Chrétien est un photographe plasticien. Fils de pilote ayant grandi
         près de la base aérienne à Orange, il se fascine très jeune, pour l'aéronautique, et ces fantastiques machines 
         crées pour accélérer le temps. Avions, voitures et fusées sont les symboles d'un monde en mouvement qui repousse
          toutes les frontières. Manolo Chrétien en capture la beauté magique pour l’imprimer sur aluminium. Ses ‘alluminations’ 
          sont le miroir de l'ambition humaine. 
        L’artiste a prolongé sa recherche photographique sur la fluidité et les reflets en investiguant la dynamique des vagues 
        et des flux aquatiques. Au travers son regard, l’océan devient une onde métallique, une mécanique naturelle.
        Manolo Chrétien vit et travaille en France.
        ");

        $manager->persist($manolo);
        $manager->flush();
        $this->addReference('manolo', $manolo);

        $jan = new Artist();

        $jan->setName("Jan BRUEGHEl le jeun");
        $jan->setDescription("Sans description");

        $manager->persist($jan);
        $manager->flush();
        $this->addReference('jan', $jan);


        $eug = new Artist();

        $eug->setName("Eugène DELACROIX");
        $eug->setDescription("En 1824, Delacroix expose au Salon Scène de massacres 
        de Scio qui rend hommage à la résistance et au courage du peuple grec révolté contre la domination turque. 
        Cette étude prépare la tête de vielle femme à droite de la composition. 
        Léon Cogniet, rendant visite à Delacroix en mai 1824, lors de l’exécution de l’œuvre, admira beaucoup 
        ce personnage qu’il rapprocha de toiles de leur ami commun, Géricault, récemment disparu. ");

        $manager->persist($eug);
        $manager->flush();
        $this->addReference('eug', $eug);

        $allegri = new Artist();

        $allegri->setName("Antonio ALLEGRI dit LE CORREGE");
        $allegri->setDescription("Corrège est l’un des plus importants peintres de la deuxième
         Renaissances italiennes. Formé dans l’entourage d’Andrea Mantegna (1431-1506), il puise ensuite à la fois 
         dans les leçons de Léonard (1452-1519) ou de Raphaël (1483-1520) et dans la palette chaude de Venise pour
          élaborer un style inédit, empreint de douceur et de sensualité. Ses compositions, parmi les plus prisées des
           collectionneurs européens jusqu’à la fin du XVIIᵉ siècle, ont influencé de manière déterminante les peintres français
            et italiens des XVIIᵉ et XVIIIᵉ siècles. ");

        $manager->persist($allegri);
        $manager->flush();
        $this->addReference('allegri', $allegri);

        $perro = new Artist();

        $perro->setName("Jean-Baptise PERRONNEAU");
        $perro->setDescription("Riche négociant orléanais, Desfriches est de ces personnalités
         qui changent le destin d’une ville. C’est lui, en l’occurrence, qui a permis qu’Orléans devienne
          au XVIIIᵉ siècle une ville artistique accueillant les plus grands artistes du temps pour des commandes 
          religieuses ou privées. D’abord lancé dans la carrière d’artiste qui le conduit à l’atelier de Dominé,
           à Orléans, jusqu’aux cours de Nicolas Bertin et de Natoire à Paris, il revient à Orléans en 1737 pour 
           reprendre le négoce familial, conservant de ses années parisiennes un carnet d’adresses bien rempli et 
           des amitiés indéfectibles, à commencer par Perronneau, Cochin ou Nonotte. Devenu un riche négociant dans 
           les produits liés au commerce de Loire (sucre, épices, textiles, probablement esclaves, dernier maillon du 
           commerce triangulaire), il fonde en 1786 avec le comte de Bizemont l’Ecole gratuite de dessin et il confie 
           à Cochin, secrétaire perpétuel de l’Académie, le soin de choisir à Paris le professeur qui enseignera
            à Orléans. Ce sera Jean Bardin, qui ouvre en 1797 avec Desfriches le musée d’Orléans pour réunir 
            des saisies révolutionnaires");

        $manager->persist($perro);
        $manager->flush();
        $this->addReference('perro', $perro);
    }
}