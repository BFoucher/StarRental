<?php
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Symfony2Extension\Context\KernelDictionary;


/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    use KernelDictionary;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @Given I create TieFighter Ship;
     */
    public function iCreateTiefighterShip()
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
            $ship = new \AppBundle\Entity\Ship();
            $category = new \AppBundle\Entity\ShipCategory();
            $category->setName('TieFighter');
            $category->setScale(1);
            $ship->setCategory($category);
            $ship->setName('TestShip');
            $ship->setAvailable(1);
            $ship->setColor('#000000');

            $em->persist($category);
            $em->persist($ship);
            $em->flush();
    }

    /**
     * @Given I create XWing Ship;
     */
    public function iCreateXWingShip()
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $ship = new \AppBundle\Entity\Ship();
        $category = new \AppBundle\Entity\ShipCategory();
        $category->setName('XWing');
        $category->setScale(2);
        $ship->setCategory($category);
        $ship->setName('TestShip2');
        $ship->setAvailable(1);

        $em->persist($category);
        $em->persist($ship);
        $em->flush();
    }

}