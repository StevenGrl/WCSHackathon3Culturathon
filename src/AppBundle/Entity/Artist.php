<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtistRepository")
 */
class Artist
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
     * @ORM\Column(name="name", type="string")
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ArtWork", mappedBy="Artist")
     */
    private $artWorks;

    /**
     * @return string
     */
    public function __toString()
    {
      return $this->name;
    }

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
     * Set description
     *
     * @param string $description
     *
     * @return Artist
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
        $this->artWorks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add artWork
     *
     * @param \AppBundle\Entity\ArtWork $artWork
     *
     * @return Artist
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
     * Set name
     *
     * @param string $name
     *
     * @return Artist
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
}
