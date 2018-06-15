<?php

namespace AppBundle\Services;

use AppBundle\Entity\Finder;
use AppBundle\Entity\Tile;
use AppBundle\Repository\TileRepository;

class MapManager
{
    /**
     * @var TileRepository
     */
    private $tileRepository;

    /**
     * MapManager constructor.
     * @param TileRepository $tileRepository
     */
    public function __construct(TileRepository $tileRepository)
    {
        $this->tileRepository = $tileRepository;
    }

    public function tileExists(int $x, int $y): bool
    {
        $tile = $this->tileRepository->findBy(array('coordX' => $x, 'coordY' => $y));
        if ($tile) {
            return true;
        } else {
            return false;
        }
    }

    public function getRandomArtwork(): Tile
    {
        $tiles = $this->tileRepository->findByType('oeuvre');
        $rand = array_rand($tiles, 1);
        $tile = $this->tileRepository->findOneById($tiles[$rand]);
        return $tile;
    }

    public function resetTreasure()
    {
        $treasureTile = $this->tileRepository->findOneByHasTreasure(1);
        if ($treasureTile) {
            $treasureTile->setHasTreasure(0);
        }
    }

    public function checkTreasure(Finder $finder): bool
    {
        $treasureArtwork = $this->tileRepository->findOneByHasTreasure(1);
        if ($treasureArtwork->getCoordX() === $finder->getCoordX() and $treasureArtwork->getCoordY() === $finder->getCoordY()) {
            return true;
        } else {
            return false;
        }
    }
}
