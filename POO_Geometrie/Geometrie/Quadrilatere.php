<?php

namespace Geometrie;

class Quadrilatere extends Polygone
{
    public function __construct(Point $a,Point $b, Point $c, Point $d)
    {
        parent::__construct($a,$b,$c,$d);
    }

    public function CalculerAire()
    {
        $t1 = new Triangle( $this->lesPoints[0],$this->lesPoints[1],$this->lesPoints[2]);
        $t2 = new Triangle( $this->lesPoints[0],$this->lesPoints[2],$this->lesPoints[3]);
        return $t1->CalculerAire()+$t2->CalculerAire();
    }

}