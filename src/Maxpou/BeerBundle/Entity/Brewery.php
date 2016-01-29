<?php

namespace Maxpou\BeerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Maxpou\BeerBundle\Model\BreweryInterface;

/**
 * Brewery
 *
 * @ORM\Table(name="brewery")
 * @ORM\Entity(repositoryClass="Maxpou\BeerBundle\Repository\BreweryRepository")
 */
class Brewery implements BreweryInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * Beer
     *
     * @var \Maxpou\BeerBundle\Entity\Beer
     *
     * @ORM\OneToMany(targetEntity="Beer", mappedBy="brewery")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beers;

    public function __construct()
    {
        $this->beers = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Brewery
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
     * Set description
     *
     * @param string $description
     *
     * @return Brewery
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
     * Add beer
     *
     * @param \Maxpou\BeerBundle\Entity\Beer $beer
     *
     * @return Brewery
     */
    public function addBeer(\Maxpou\BeerBundle\Entity\Beer $beer)
    {
        $this->beers[] = $beer;

        return $this;
    }

    /**
     * Remove beer
     *
     * @param \Maxpou\BeerBundle\Entity\Beer $beer
     */
    public function removeBeer(\Maxpou\BeerBundle\Entity\Beer $beer)
    {
        $this->beers->removeElement($beer);
    }

    /**
     * Get beers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBeers()
    {
        return $this->beers;
    }
}