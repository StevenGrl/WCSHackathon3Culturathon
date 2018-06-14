<?php

namespace AppBundle\Traits;

use AppBundle\Entity\Guide;
use Doctrine\ORM\EntityManagerInterface;

trait GuideTrait
{
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getGuide()
    {
        return $this->em->getRepository(Guide::class)->findOneBy([]);
    }
}