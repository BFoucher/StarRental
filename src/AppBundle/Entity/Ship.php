<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ship
 *
 * @ORM\Table(name="ship")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShipRepository")
 */
class Ship
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
     * @ORM\Column(name="color", type="string", length=7, nullable=true)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="ShipCategory")
     */
    private $category;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Ship
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
     * Set category
     *
     * @param \AppBundle\Entity\ShipCategory $category
     * @return Ship
     */
    public function setCategory(\AppBundle\Entity\ShipCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\ShipCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Ship
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }
}
