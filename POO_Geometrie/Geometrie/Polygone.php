<?php

namespace Geometrie;

abstract class Polygone implements IFigure
{
    protected $lesPoints;

    public function __construct(...$desPoints)
    {
        $this->lesPoints=$desPoints;
    }

    public function CalculerPerimetre() : float {
        $total = 0;

        for ($i=1;$i<=count($this->lesPoints)-1;$i++){
            $total += $this->lesPoints[$i]->CalculerDistance($this->lesPoints[$i-1]);
        }
        $total += $this->lesPoints[0]->CalculerDistance($this->lesPoints[count($this->lesPoints)-1]);

        return $total;
    }
    public abstract function CalculerAire() ;

    public function DessinerHtml()
    {?>
         <script>
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            ctx.beginPath();
            ctx.moveTo(<?php echo $this->lesPoints[0]->x?>,<?php echo $this->lesPoints[0]->y?>);
            <?php
            for ($i=1;$i<=count($this->lesPoints)-1;$i++){?>
            ctx.lineTo(<?php  echo $this->lesPoints[$i]->x?>,<?php echo $this->lesPoints[$i]->y?>);
            <?php }?>
            ctx.closePath();

            // the outline
            ctx.lineWidth = 10;
            ctx.strokeStyle = '#666666';
            ctx.stroke();

            // the fill color
            ctx.fillStyle = "#93b3fa";
            ctx.fill();
        </script>
    <?php }

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

}