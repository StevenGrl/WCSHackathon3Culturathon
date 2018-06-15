<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ArtWork;
use AppBundle\Entity\Finder;
use AppBundle\Entity\Tile;
use AppBundle\Services\MapManager;
use AppBundle\Traits\FinderTrait;
use Doctrine\ORM\EntityManagerInterface;
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
    public function displayMapAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tiles = $em->getRepository(Tile::class)->findAll();

        foreach ($tiles as $tile) {
            $map[$tile->getCoordX()][$tile->getCoordY()] = $tile;
        }

        $finder = $this->getFinder();

        $tileTreasure = $em->getRepository(Tile::class)->findOneByHasTreasure(1);

        $artWorkRepo = $em->getRepository(ArtWork::class);

        $question = $artWorkRepo->findOneByTile($tileTreasure)->getEnigma();


        $form = $this->createForm('AppBundle\Form\AnswerType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $rightAnswer = $artWorkRepo->findOneByTile($tileTreasure)->getAnswer();
            if ($data['answer'] == $rightAnswer) {
                $this->addFlash('success', 'Tu as trouvé la réponse bravo à toi mon grand :) !');
            } else {
                $this->addFlash('danger', 'Ce n\'est pas ça, essaie encore ! ;)');
            }
        }

        return $this->render('map/index.html.twig', [
            'map' => $map ?? [],
            'finder' => $finder,
            'question' => $question,
            'form' => $form->createView(),
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
        $finder->setCoordX(3);
        $finder->setCoordY(7);

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
