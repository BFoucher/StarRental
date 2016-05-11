<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookingRepository")
 */
class Booking
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateStart", type="date")
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="date")
     */
    private $dateEnd;

    /**
     * @var bool
     *
     * @ORM\Column(name="Outclassed", type="boolean")
     */
    private $outclassed = 0;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Ship")
     */
    private $ship;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     */
    private $customer;


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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return Booking
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return Booking
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime 
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set outclassed
     *
     * @param boolean $outclassed
     * @return Booking
     */
    public function setOutclassed($outclassed)
    {
        $this->outclassed = $outclassed;

        return $this;
    }

    /**
     * Get outclassed
     *
     * @return boolean 
     */
    public function getOutclassed()
    {
        return $this->outclassed;
    }

    /**
     * Set ship
     *
     * @param \AppBundle\Entity\Ship $ship
     * @return Booking
     */
    public function setShip(\AppBundle\Entity\Ship $ship = null)
    {
        $this->ship = $ship;

        return $this;
    }

    /**
     * Get ship
     *
     * @return \AppBundle\Entity\Ship 
     */
    public function getShip()
    {
        return $this->ship;
    }

    /**
     * Set customer
     *
     * @param \AppBundle\Entity\Customer $customer
     * @return Booking
     */
    public function setCustomer(\AppBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AppBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
