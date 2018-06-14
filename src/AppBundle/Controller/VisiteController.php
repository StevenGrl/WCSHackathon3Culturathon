<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Guide;
use AppBundle\Entity\Tile;
use AppBundle\Services\MapManager;
use AppBundle\Traits\GuideTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VisiteController extends Controller
{
    use GuideTrait;

    /**
     * @Route("/visite/", name="visite")
     */
    public function displayMapAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tiles = $em->getRepository(Tile::class)->findAll();

        foreach ($tiles as $tile) {
            $map[$tile->getCoordX()][$tile->getCoordY()] = $tile;
        }

        $finder = $this->getGuide();

        return $this->render('visite/index.html.twig', [
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
        $finderManager = $this->getDoctrine()->getRepository(Guide::class);
        $finder = $finderManager->findOneByName('Watson');
        $finder->setCoordX(3);
        $finder->setCoordY(7);

        //Reset and put treasure on a random island
        $tileManager = $this->getDoctrine()->getRepository(Tile::class);

        return $this->redirectToRoute('visite');
    }
}
