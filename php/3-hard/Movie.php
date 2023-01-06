<?php

declare(strict_types=1);


namespace App;

/**
 *  Classe pour les films 
 *  La classe attends un titre string et un code de prix int
 *  Elle contient une méthonde pour récupérer le code de prix : getPriceCode. Elle retourne un entier.
 *  Elle contient une méthode pour définir le code de prix : setPriceCode. Elle attent un entier et retourne le code de prix
 *  Elle contient une méthode pour récupérer le titre du film : getTitle. Elle retourne un string
 */
class Movie
{
    // Définition des constantes utilisé pour les calculs de montants dans Customer
    // Utilisation possible d'énumération ? 
    public const CHILDREN = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    private string $title;
    private int $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $code)
    {
        return $this->priceCode = $code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}