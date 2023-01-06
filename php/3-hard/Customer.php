<?php

declare(strict_types=1);


namespace App;

/**
 *  Classe pour les clients ayant loué des films
 *  La classe attends un nom 
 *  Elle contient une méthonde pour ajouter des locations : addRental. Elle attend un objet Rental.
 *  Elle contient une méthode pour récupérer le nom : getName. Elle retourne un string
 *  Elle contient une méthode afficher le montant total des locations et la fréquence de locations: statement. Elle retourne un string
 */
class Customer
{


    public function __construct(String $name)
    {
        $this->name = $name;
    }

    /**
     * Méthode pour ajouter une location
     * Il manque le type de retour 
     */
    public function addRental(Rental $rental) 
    {
        return $this->rentals[] = $rental;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Méthode pour caluler le montant total des locations en fonction de leurs types Regular, New_Release, Children et du nombre de jours louées
     * Elle calcule aussi la fréquence de location en fonction du nombre de film louées et, si le film est nouveau et qu'il a été loué plus d'un jour
     * Le montant total est formatée exemple : 300000 = 300,000.0
     */
    public function statement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        // Parcours des locations 
        foreach ($this->rentals as $each){
           $thisAmount = 0.0;

           /* @var $each Rental */
           // determines the amount for each line

            // Il manque le cas défault
           switch($each->getMovie()->getPriceCode()) {
               case Movie::REGULAR:
                   $thisAmount += 2;
                   if($each->getDaysRented() > 2)
                       $thisAmount += ($each->getDaysRented() - 2) * 1.5;
                   break;
               case Movie::NEW_RELEASE:
                   $thisAmount += $each->getDaysRented() * 3;
                   break;
               case Movie::CHILDREN:
                   $thisAmount += 1.5;
                   if($each->getDaysRented() > 3) {
                       $thisAmount += ($each->getDaysRented() - 3) * 1.5;
                   }
                   break;
           }

           $frequentRenterPoints++;

           if($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE
                && $each->getDaysRented() > 1)
               $frequentRenterPoints++;

            $result .= "\t" . $each->getMovie()->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;

        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }

    private string $name;
    private array $rentals = [];
}