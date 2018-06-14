<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtWork
 *
 * @ORM\Table(name="art_work")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtWorkRepository")
 */
class ArtWork
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
     * @var string
     *
     * @ORM\Column(name="artist", type="string", length=255)
     */
    private $artist;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="enigma", type="text")
     */
    private $enigma;
    /**
     * @var float
     * @ORM\Column(name="size_h", type="float")
     */
    private $sizeH;
    /**
     * @var float
     * @ORM\Column(name="size_w", type="float")
     */
    private $sizeW;
    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text")
     */
    private $answer;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Type", inversedBy="artWorks")
     */
    private $type;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tech", inversedBy="artWorks")
     */
    private $tech;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Materials", inversedBy="artWorks")
     */
    private $materials;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Room", inversedBy="artWorks")
     */
    private $room;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Museum", inversedBy="artWorks")
     */
    private $museum;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paint", inversedBy="artWorks")
     */
    private $paint;

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
     * @return ArtWork
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
     * Set artist
     *
     * @param string $artist
     *
     * @return ArtWork
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ArtWork
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
     * Set coordX
     *
     * @param integer $coordX
     *
     * @return ArtWork
     */
    public function setCoordX($coordX)
    {
        $this->coordX = $coordX;

        return $this;
    }

    /**
     * Get coordX
     *
     * @return int
     */
    public function getCoordX()
    {
        return $this->coordX;
    }

    /**
     * Set coordY
     *
     * @param integer $coordY
     *
     * @return ArtWork
     */
    public function setCoordY($coordY)
    {
        $this->coordY = $coordY;

        return $this;
    }

    /**
     * Get coordY
     *
     * @return int
     */
    public function getCoordY()
    {
        return $this->coordY;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ArtWork
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set enigma
     *
     * @param string $enigma
     *
     * @return ArtWork
     */
    public function setEnigma($enigma)
    {
        $this->enigma = $enigma;

        return $this;
    }

    /**
     * Get enigma
     *
     * @return string
     */
    public function getEnigma()
    {
        return $this->enigma;
    }

    /**
     * Set answer
     *
     * @param string $answer
     *
     * @return ArtWork
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\Type $type
     *
     * @return ArtWork
     */
    public function setType(\AppBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set tech
     *
     * @param \AppBundle\Entity\Tech $tech
     *
     * @return ArtWork
     */
    public function setTech(\AppBundle\Entity\Tech $tech = null)
    {
        $this->tech = $tech;

        return $this;
    }

    /**
     * Get tech
     *
     * @return \AppBundle\Entity\Tech
     */
    public function getTech()
    {
        return $this->tech;
    }

    /**
     * Set materials
     *
     * @param \AppBundle\Entity\Materials $materials
     *
     * @return ArtWork
     */
    public function setMaterials(\AppBundle\Entity\Materials $materials = null)
    {
        $this->materials = $materials;

        return $this;
    }

    /**
     * Get materials
     *
     * @return \AppBundle\Entity\Materials
     */
    public function getMaterials()
    {
        return $this->materials;
    }

    /**
     * Set room
     *
     * @param \AppBundle\Entity\Room $room
     *
     * @return ArtWork
     */
    public function setRoom(\AppBundle\Entity\Room $room = null)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return \AppBundle\Entity\Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set museum
     *
     * @param \AppBundle\Entity\Museum $museum
     *
     * @return ArtWork
     */
    public function setMuseum(\AppBundle\Entity\Museum $museum = null)
    {
        $this->museum = $museum;

        return $this;
    }

    /**
     * Get museum
     *
     * @return \AppBundle\Entity\Museum
     */
    public function getMuseum()
    {
        return $this->museum;
    }

    /**
     * Set paint
     *
     * @param \AppBundle\Entity\Paint $paint
     *
     * @return ArtWork
     */
    public function setPaint(\AppBundle\Entity\Paint $paint = null)
    {
        $this->paint = $paint;

        return $this;
    }

    /**
     * Get paint
     *
     * @return \AppBundle\Entity\Paint
     */
    public function getPaint()
    {
        return $this->paint;
    }

    /**
     * Set sizeH
     *
     * @param float $sizeH
     *
     * @return ArtWork
     */
    public function setSizeH($sizeH)
    {
        $this->sizeH = $sizeH;

        return $this;
    }

    /**
     * Get sizeH
     *
     * @return float
     */
    public function getSizeH()
    {
        return $this->sizeH;
    }

    /**
     * Set sizeW
     *
     * @param float $sizeW
     *
     * @return ArtWork
     */
    public function setSizeW($sizeW)
    {
        $this->sizeW = $sizeW;

        return $this;
    }

    /**
     * Get sizeW
     *
     * @return float
     */
    public function getSizeW()
    {
        return $this->sizeW;
    }
}
