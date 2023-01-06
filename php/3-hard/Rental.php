<?php

declare(strict_types=1);


namespace App;

/**
 * Classe pour la location de film
 * ELle attend un film en entrée Movie et un entier pour le nombre de jour loués
 * Elle contient une méthode pour récupérer le nombre de jour loué : getDaysRented. Elle retourne un entier
 * Elle contient une méthode pour récupérer les films : getMovie. Elle retourne Movie
 */
class Rental
{
    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented(): int
    {
        return $this->daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    private Movie $movie;
    private int $daysRented;
}