<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Finder;
use AppBundle\Entity\Tile;
use AppBundle\Services\MapManager;
use AppBundle\Traits\FinderTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MapController extends Controller
{
    use FinderTrait;

    /**
     * @Route("/map", name="map")
     */
    public function displayMapAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tiles = $em->getRepository(Tile::class)->findAll();

        foreach ($tiles as $tile) {
            $map[$tile->getCoordX()][$tile->getCoordY()] = $tile;
        }

        $finder = $this->getFinder();

        return $this->render('map/index.html.twig', [
            'map'  => $map ?? [],
            'finder' => $finder,
        ]);
    }

    /**
     * @Route("/start", name="start")
     */
    public function start()
    {
        $em = $this->getDoctrine()->getManager();
        // Reset boat Coord
        $finderManager = $this->getDoctrine()->getRepository(Finder::class);
        $finder = $finderManager->findOneByName('Sherlock');
        $finder->setCoordX(4);
        $finder->setCoordY(8);

        //Reset and put treasure on a random island
        $tileManager = $this->getDoctrine()->getRepository(Tile::class);

        $mapManager = new MapManager($tileManager);
        $mapManager->resetTreasure();
        $islandTreasure = $mapManager->getRandomIsland();
        $tile = $tileManager->findOneById($islandTreasure->getId())->setHasTreasure(1);
        $em->flush();

        return $this->redirectToRoute('map');
    }
}
