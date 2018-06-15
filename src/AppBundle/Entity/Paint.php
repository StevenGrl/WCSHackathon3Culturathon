<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paint
 *
 * @ORM\Table(name="paint")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaintRepository")
 */
class Paint
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ArtWork", mappedBy="paint")
     */
    private $artWorks;
    /**
     * @var string
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
     * Set name
     *
     * @param string $name
     *
     * @return Paint
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artWorks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add artWork
     *
     * @param \AppBundle\Entity\ArtWork $artWork
     *
     * @return Paint
     */
    public function addArtWork(\AppBundle\Entity\ArtWork $artWork)
    {
        $this->artWorks[] = $artWork;

        return $this;
    }

    /**
     * Remove artWork
     *
     * @param \AppBundle\Entity\ArtWork $artWork
     */
    public function removeArtWork(\AppBundle\Entity\ArtWork $artWork)
    {
        $this->artWorks->removeElement($artWork);
    }

    /**
     * Get artWorks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtWorks()
    {
        return $this->artWorks;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Paint
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
}
