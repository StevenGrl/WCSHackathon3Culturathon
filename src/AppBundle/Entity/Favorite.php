<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favorite
 *
 * @ORM\Table(name="favorite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FavoriteRepository")
 */
class Favorite
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ArtWork", inversedBy="oeuvres")
     */
    private $oeuvre;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="users")
     */
    private $user;

    /**
     * @var bool
     * @ORM\Column(name="favourite", type="integer")
     */
    private $favourite;

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
     * Set oeuvre
     *
     * @param integer $oeuvre
     *
     * @return Favorite
     */
    public function setOeuvre($oeuvre)
    {
        $this->oeuvre = $oeuvre;

        return $this;
    }

    /**
     * Get oeuvre
     *
     * @return int
     */
    public function getOeuvre()
    {
        return $this->oeuvre;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Favorite
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set favourite
     *
     * @param integer $favourite
     *
     * @return Favorite
     */
    public function setFavourite($favourite)
    {
        $this->favourite = $favourite;

        return $this;
    }

    /**
     * Get favourite
     *
     * @return integer
     */
    public function getFavourite()
    {
        return $this->favourite;
    }

    /**
     * Set people
     *
     * @param integer $people
     *
     * @return Favorite
     */
    public function setPeople($people)
    {
        $this->people = $people;

        return $this;
    }

    /**
     * Get people
     *
     * @return integer
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * Set oeuvres
     *
     * @param integer $oeuvres
     *
     * @return Favorite
     */
    public function setOeuvres($oeuvres)
    {
        $this->oeuvres = $oeuvres;

        return $this;
    }

    /**
     * Get oeuvres
     *
     * @return integer
     */
    public function getOeuvres()
    {
        return $this->oeuvres;
    }

    /**
     * Set peoples
     *
     * @param integer $peoples
     *
     * @return Favorite
     */
    public function setPeoples($peoples)
    {
        $this->peoples = $peoples;

        return $this;
    }

    /**
     * Get peoples
     *
     * @return integer
     */
    public function getPeoples()
    {
        return $this->peoples;
    }
}
