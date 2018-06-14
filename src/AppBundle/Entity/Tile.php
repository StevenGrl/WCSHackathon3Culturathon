<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tile
 *
 * @ORM\Table(name="tile")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TileRepository")
 */
class Tile
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="coordX", type="integer")
     */
    private $coordX;

    /**
     * @var string
     *
     * @ORM\Column(name="coordY", type="integer")
     */
    private $coordY;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_treasure", type="boolean")
     */
    private $hasTreasure;

    /**
     * @ORM\OneToOne(targetEntity="ArtWork")
     * @ORM\JoinColumn(name="artwork_id", referencedColumnName="id")
     */
    private $artwork;


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
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Tile
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get coordX
     *
     * @return int
     */
    public function getCoordX(): int
    {
        return $this->coordX;
    }

    /**
     * Set coordX
     *
     * @param integer $coordX
     *
     * @return Tile
     */
    public function setCoordX(int $coordX)
    {
        $this->coordX = $coordX;

        return $this;
    }

    /**
     * Get coordY
     *
     * @return integer
     */
    public function getCoordY(): int
    {
        return $this->coordY;
    }

    /**
     * Set coordY
     *
     * @param integer $coordY
     *
     * @return Tile
     */
    public function setCoordY(int $coordY)
    {
        $this->coordY = $coordY;

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
     * Set name
     *
     * @param string $name
     *
     * @return Tile
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHasTreasure(): bool
    {
        return $this->hasTreasure;
    }

    /**
     * @param bool $hasTreasure
     * @return Tile
     */
    public function setHasTreasure(bool $hasTreasure): Tile
    {
        $this->hasTreasure = $hasTreasure;
        return $this;
    }

    /**
     * Get hasTreasure
     *
     * @return boolean
     */
    public function getHasTreasure()
    {
        return $this->hasTreasure;
    }

    /**
     * Set artwork
     *
     * @param \AppBundle\Entity\ArtWork $artwork
     *
     * @return Tile
     */
    public function setArtwork(\AppBundle\Entity\ArtWork $artwork = null)
    {
        $this->artwork = $artwork;

        return $this;
    }

    /**
     * Get artwork
     *
     * @return \AppBundle\Entity\ArtWork
     */
    public function getArtwork()
    {
        return $this->artwork;
    }
}
