<?php
namespace AppBundle\Utils;
use AppBundle\Entity\Customer;
use AppBundle\Entity\Ship;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

//TODO : replace category'id by scaling category
class Outclass
{
    protected $em;
    protected $ship;
    protected $xWing = 4; // id of xWing  category
    protected $tieFighter = 3; //id of TieFighter category


    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function canOutclass(Ship $ship, Customer $customer){
        //Check if less than 15% of xWing are available
        if (!$this->shipCategoryAvailable($this->xWing,15)){
            return false;
        }
        //Check if more than 50% of TieFighter are avilable
        if ($this->shipCategoryAvailable($this->tieFighter,50)){
            return false;
        }
        //Check if customer book 3 or more ship last 30days.
        if ($this->customerBookingLastMonth($customer) < 3){
            return false;
        };


        return true;
    }

    public function shipCategoryAvailable($category,$limit){
        //Nb Ships in this same Category
        $nbShips = $this->em->getRepository('AppBundle:Ship')->countNbCat($category);
        //Nb Available Ships in same Category
        $nbAvailableShip =  $this->em->getRepository('AppBundle:Ship')->countNbCatAvailable($category);

        // Return true if less than limit available
        $ratio = ($nbAvailableShip*100/$nbShips);
        if($ratio <=$limit){
            return true;
        }
        return false;
    }
    
    public function customerBookingLastMonth($customer){
        $nbBooking = $this->em->getRepository('AppBundle:Booking')->countBookingLastMonth($customer->getId());

        return $nbBooking;
    }
}