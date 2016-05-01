<?php
namespace AppBundle\Utils;
use AppBundle\Entity\Ship;
use Doctrine\ORM\EntityManager;

//TODO : replace category'id by scaling category
class Outclass
{
    protected $em;
    protected $ship;
    protected $xWing = 6; // id of xWing  category
    protected $tieFighter = 5; //id of TieFighter category


    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function canOutclass(Ship $ship){
        if ($this->shipCategoryAvailable($this->xWing,15)){
            if (!$this->shipCategoryAvailable($this->tieFighter,50)){
                //TODO: Check Customer recent booking
                return true;
            }
        }
        return false;
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
}