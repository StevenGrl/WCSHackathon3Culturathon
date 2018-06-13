<?php

namespace AppBundle\Traits;

use AppBundle\Entity\Finder;
use Doctrine\ORM\EntityManagerInterface;

trait FinderTrait
{
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFinder()
    {
        return $this->em->getRepository(Finder::class)->findOneBy([]);
    }
}
