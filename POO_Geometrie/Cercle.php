<?php

namespace Geometrie;
include_once "Point.php";

class Cercle implements IFigure
{
    public $centre;
    public $rayon;

    /**
     * @param Point $centre
     * @param float $rayon
     */
    public function __construct(Point $centre, float $rayon)
    {
        $this->centre = $centre;
        $this->rayon = $rayon;
    }

    public function CalculerAire(): float
    {
        return 2 *pi() *$this->rayon;
    }

    public function CalculerPerimetre(): float
    {
        return pi() *$this->rayon *$this->rayon;
    }

    public function DessinerHtml()
    {?>
        <script>
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            ctx.beginPath();
            ctx.arc(<?php echo $this->centre->x?>, <?php echo $this->centre->y?>, <?php echo $this->rayon?>, 0, 2 * Math.PI);
            ctx.fillStyle='#15E62F';
            ctx.fill();
            ctx.stroke();
        </script>
<?php }
}