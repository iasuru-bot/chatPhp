<?php

namespace Geometrie;

include_once "Point.php";

class Polygone
{
    private $lesPoints;

    public function __construct(...$desPoints)
    {
        $this->lesPoints=$desPoints;
    }

    public function __toString() : String
    {
        $s="[";
        foreach ($this->lesPoints as $p)
        {
            $s.=$p.","; //on concatène avec un point comme un +
        }
        $s.="]";

        return $s;
    }

    public function CalculerPerimetre() : float {
        $total = 0;

        for ($i=1;$i<=count($this->lesPoints)-1;$i++){
            $total += $this->lesPoints[$i]->CalculerDistance($this->lesPoints[$i-1]);
        }
        $total += $this->lesPoints[0]->CalculerDistance($this->lesPoints[count($this->lesPoints)-1]);

        return $total;
    }
}