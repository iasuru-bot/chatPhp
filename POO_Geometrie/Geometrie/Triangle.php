<?php

namespace Geometrie;

class Triangle extends Polygone
{
    public function __construct(Point $a,Point $b, Point $c)
    {
        parent::__construct($a,$b,$c);
    }

    public function estIsocele() : bool{

        $c1 =$this->lesPoints[0]->CalculerDistance($this->lesPoints[1]);
        $c2 =$this->lesPoints[2]->CalculerDistance($this->lesPoints[1]);
        $c3 =$this->lesPoints[0]->CalculerDistance($this->lesPoints[2]);
        return $c1==$c3|| $c1==$c2|| $c2==$c3;
    }


    public function calculerAire(): float
    {
        $c1=$this->lesPoints[0]->CalculerDistance($this->lesPoints[1]);
        $c2=$this->lesPoints[1]->CalculerDistance($this->lesPoints[2]);
        $c3=$this->lesPoints[2]->CalculerDistance($this->lesPoints[0]);
        $p = ($this->CalculerPerimetre())/2;
        $a=sqrt($p*($p-$c1)*($p-$c3)*($p-$c2));
        return $a;
    }

}