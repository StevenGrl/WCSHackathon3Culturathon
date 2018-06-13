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

    public function getRandomIsland(): Tile
    {
        $tiles = $this->tileRepository->findByType('Island');
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

    public function checkTreasure(Boat $boat): bool
    {
        $treasureIsland = $this->tileRepository->findOneByHasTreasure(1);
        if ($treasureIsland->getCoordX() === $boat->getCoordX() and $treasureIsland->getCoordY() === $boat->getCoordY()) {
            return true;
        } else {
            return false;
        }
    }
}
