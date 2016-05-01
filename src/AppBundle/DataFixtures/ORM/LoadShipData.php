<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Ship;
use AppBundle\Entity\ShipCategory;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadShipData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $names = ['Adélaïde', 'Adèle', 'Adéline', 'Adrienne', 'Agnès', 'Alberta', 'Albertine', 'Aldéa', 'Alexandrine', 'Alexina', 'Alfréda', 'Alice', 'Alida', 'Aline', 'Alma', 'Alphonsine', 'Alvine', 'Alya', 'Amandine', 'Amarélys', 'Améléria', 'Amélia', 'Andrée', 'Angèle', 'Angélina', 'Angéline', 'Anita', 'Anne', 'Anne-Marie', 'Annette', 'Antoinette', 'Antonia', 'Arthémise', 'Auréa', 'Aurélie', 'Aurore', 'Bastienne', 'Béatrice', 'Bella', 'Bernadette', 'Berthe', 'Berthine', 'Bibiane', 'Binta', 'Blandine', 'Blanche', 'Camélia', 'Carmelle', 'Carmen', 'Caroline', 'Catherine', 'Cécile', 'Cédulie', 'Célina', 'Claire', 'Clara', 'Clémentine', 'Clérina', 'Clothilde', 'Colette', 'Constance', 'Cora', 'Coronna', 'Cyprienne', 'Dalia', 'Danielle', 'Délima', 'Denise', 'Desneiges', 'Diana', 'Dijah', 'Dolorès', 'Domenica', 'Dona', 'Donalda', 'Dora', 'Doris', 'Dulcina', 'Édalia', 'Édesse', 'Edmondine', 'Églantine', 'Éléonard', 'Éléonore', 'Élianne', 'Élisabeth', 'Élisanna', 'Elzire', 'Émérentienne', 'Émerise', 'Émilda', 'Émilia', 'Émilie', 'Emma', 'Ernestine', 'Esméralda', 'Étiennette', 'Eudocie', 'Eugénie', 'Eulalie', 'Euphrasie', 'Eva', 'Évelyne', 'Fabienne', 'Fabiola', 'Félicité', 'Fernande', 'Fleurette', 'Fleurina', 'Flora', 'Flore', 'Florence', 'Florianne', 'Florida', 'Florise', 'Fortuna', 'France', 'Françoise', 'Gabrielle', 'Gemma', 'Geneviève', 'Georgette', 'Georgianna', 'Germaine', 'Gertrude', 'Ghislaine', 'Gilberte', 'Gisèle', 'Gloria', 'Gracia', 'Graciette', 'Héléna', 'Hélène', 'Henriette', 'Huguette', 'Ida', 'Imelda', 'Irène', 'Irine', 'Irma', 'Isabelle', 'Isola', 'Jacqueline', 'Jeanette', 'Jeanne', 'Jeanne-d\'Arc', 'Jeannine', 'Joan', 'of', 'Arc', 'Jocelyne', 'Joséphine', 'Josephte', 'Jovette', 'Judith', 'Julia', 'Julienne', 'Juliette', 'Katé', 'Katherine', 'Laeticia', 'Laura', 'Laure', 'Laurenna', 'Laurette', 'Laure-Yvonne', 'Laurianna', 'Léa', 'Léliette', 'Léona', 'Léontine', 'Liane', 'Liliane', 'Lily', 'Lina', 'Lise', 'Lorenza', 'Louisa', 'Louise', 'Louisette', 'Luce', 'Lucie', 'Lucie-Anne', 'Lucienne', 'Lucille', 'Lucina', 'Lydia', 'Mabel', 'Madeleine', 'Magella', 'Maggie', 'Maine', 'Marcelle', 'Marcelyne', 'Margot', 'Marguerite', 'Marguerite-Marie', 'Maria', 'Marianne', 'Maria-Rolanda', 'Marie', 'Marie-Ange', 'Marie-Anna', 'Marie-Bella', 'Marie-Blanche', 'Marie-Claire', 'Marie-Jeanne', 'Marie-Laéticia', 'Marie-Laure', 'Marielle', 'Marie-Louise', 'Marie-Marthe', 'Marie-Maxima', 'Marie-May', 'Marie-Neige', 'Marie-Nicolas', 'Marie-Paule', 'Marie-Rose', 'Mariette', 'Marjolaine', 'Marthe', 'Mélina', 'Mélinda', 'Mercédes', 'Monique', 'Muguette', 'Myrtle', 'Nicole', 'Noëlla', 'Nora', 'Odette', 'Olive', 'Omérille', 'Orise', 'Palmyre', 'Pamela', 'Pâquerette', 'Parmélia', 'Patricia', 'Pauline', 'Philomène', 'Pierrette', 'Précile', 'Présentine', 'Rachel', 'Raya', 'Raymonde', 'Régina', 'Reine-Aimée', 'Réjeanne', 'Renée', 'Résina', 'Rita', 'Rolande', 'Rosa', 'Rosanna', 'Rosanne', 'Rose', 'Rose-Aimée', 'Rose-Alba', 'Rose-Alice', 'Rose-Alma', 'Rose-Anna', 'Rose-Céleste', 'Rose-de-Lima', 'Saforane', 'Sarah', 'Sarina', 'Simone', 'Solange', 'Sophia', 'Sophronue', 'Stella', 'Thérèse', 'Valentine', 'Velada', 'Venerika', 'Violaine', 'Violette', 'Vitaline', 'Wilma-Jeane', 'Yolande', 'Yvette', 'Yvonne', 'Zéphirine'];
        $colors = ['#000000','#FFFFFF'];
        $tieFighter = new ShipCategory();
        $tieFighter->setName('TieFighter');
        $tieFighter->setScale(2);
        $manager->persist($tieFighter);

        $xWing = new ShipCategory();
        $xWing->setName('XWing');
        $xWing->setScale(1);
        $manager->persist($xWing);

        $shipCategories = [$tieFighter, $xWing];

        for ($i=0;$i<15;$i++)
        {
            $ship = new Ship();
            $ship->setName($names[array_rand($names)]);
            $ship->setCategory($shipCategories[rand(0,1)]);
            $ship->setAvailable(rand(0,1));
            if($ship->getCategory() === $tieFighter){
                $ship->setColor($colors[array_rand($colors)]);
            }
            $manager->persist($ship);
        }

        $manager->flush();

    }
}
