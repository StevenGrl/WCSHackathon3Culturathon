<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Finder
 *
 * @ORM\Table(name="finder")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FinderRepository")
 */
class Finder
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
     * @var int
     *
     * @ORM\Column(name="coordX", type="integer")
     */
    private $coordX;

    /**
     * @var int
     *
     * @ORM\Column(name="coordY", type="integer")
     */
    private $coordY;


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
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Finder
     */
    public function setName(string $name)
    {
        $this->name = $name;

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
     * @return Finder
     */
    public function setCoordX(int $coordX)
    {
        $this->coordX = $coordX;

        return $this;
    }

    /**
     * Get coordY
     *
     * @return int
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
     * @return Finder
     */
    public function setCoordY(int $coordY)
    {
        $this->coordY = $coordY;

        return $this;
    }
}
