<?php

namespace Geometrie;

class Point
{
    public $x;
    public $y;

    //constructeur de la classe
    public function __construct(int $abscisse, int $ordonnee)
    {
        $this->x=$abscisse;
        $this->y=$ordonnee;
    }

    public function __toString() : String {
        return "(".$this->x.";".$this->y.")"; // retourne une chaine style (3;4)
    }
    public function CalculerDistance(Point $autrePoint): float{
        //echo $autrePoint."a".$this."est".sqrt(pow($this->x-$autrePoint->x,2)+pow($this->y - $autrePoint->y, 2));
        return sqrt(pow($this->x-$autrePoint->x,2)+pow($this->y - $autrePoint->y, 2));
    }
}