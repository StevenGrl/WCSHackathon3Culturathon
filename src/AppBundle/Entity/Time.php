<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Time
 *
 * @ORM\Table(name="time")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TimeRepository")
 */
class Time
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     *@ORM\OneToMany(targetEntity="AppBundle\Entity\ArtWork", mappedBy="time")
     */
    private $times;

    /**
     * @var string
     *
     * @ORM\Column(name="period", type="string", length=255)
     */
    private $period;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set period
     *
     * @param string $period
     *
     * @return Time
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Time
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->times = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add time
     *
     * @param \AppBundle\Entity\ArtWork $time
     *
     * @return Time
     */
    public function addTime(\AppBundle\Entity\ArtWork $time)
    {
        $this->times[] = $time;

        return $this;
    }

    /**
     * Remove time
     *
     * @param \AppBundle\Entity\ArtWork $time
     */
    public function removeTime(\AppBundle\Entity\ArtWork $time)
    {
        $this->times->removeElement($time);
    }

    /**
     * Get times
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimes()
    {
        return $this->times;
    }
}
