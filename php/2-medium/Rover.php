<?php

declare(strict_types=1);

namespace App;

/**
 *  Classe pour les voitures rovers
 *  La classe attends une direction, une position X et une position Y
 *  Elle contient une méthonde permettant d'avancer dans une direction précise
 */
class Rover
{   
    // Représente une direction NORD / WEST / SUD / EST
    private string $direction;
    // Représente un positon vertical
    private int $y;
    // Représente une position horizontal
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }


    /**
     * Méthode acceptant un paramètre String, représentant une séquence de commande 
     * La méthode déplace les positions du Rover en fonction de la direction et des commandes
     * @param string $commandsSequence : Commande de séquence  un charactère correspond à une commande
     */
    public function receive(string $commandsSequence): void
    {
        //On récupère la longueur des séquences pour le parcourir
        $commandsSequenceLenght = strlen($commandsSequence);
        // Parcours de la commande 
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            // Pour les commandes left / right
            if ($command === "l" || $command === "r") {
                // Rotate Rover
                //Pour la direction nord, si la commande est right alors la direction est Est
                // Sinon elle sera West
                if ($this->direction === "N") {
                    if ($command === "r") {
                        $this->direction = "E";
                    } else {
                        $this->direction = "W";
                    }
                // Pour la direction Sud, si la commande est right alors la direction sera West
                // Sinon elle sera Est
                } else if ($this->direction === "S") {
                    if ($command === "r") {
                        $this->direction = "W";
                    } else {
                        $this->direction = "E";
                    }
                // Pour la direction West, si la commande est right alors la direction sera Nord
                // Sinon elle sera Sud
                } else if ($this->direction === "W") {
                    if ($command === "r") {
                        $this->direction = "N";
                    } else {
                        $this->direction = "S";
                    }
                // Pour la direction EST, si la commande est right alors la direction sera Siud
                // Sinon elle sera Nord    
                } else {
                    if ($command === "r") {
                        $this->direction = "S";
                    } else {
                        $this->direction = "N";
                    }
                }
            // Dans le cas ou on avance la voiture
            } else {
                // Displace Rover
                //Pour reculer, le déplacement sera de -1
                $displacement1 = -1;
                
                // Si la commande est avancer, alors le déplacement sera de 1
                if ($command === "f") {
                    $displacement1 = 1;
                }
                $displacement = $displacement1;

                // Pour la direction Nord, on ajoute le déplacement sur la Position Y
                // Pour la direction Sud, On enlève le déplacement sur la position Y
                // POur la direction West, On enlève le déplacement sur la positon X
                // Pour la direction Est, On ajoute le déplacement sur la position X
                if ($this->direction === "N") {
                    $this->y += $displacement;
                } else if ($this->direction === "S") {
                    $this->y -= $displacement;
                } else if ($this->direction === "W") {
                    $this->x -= $displacement;
                } else {
                    $this->x += $displacement;
                }
            }
        }
    }
}