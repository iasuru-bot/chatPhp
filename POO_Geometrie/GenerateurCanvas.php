<?php

namespace Geometrie;
include_once "Triangle.php";
include_once "Quadrilatere.php";
include_once "IFigure.php";

class GenerateurCanvas
{

    private $figures;
    private $largeur;
    private $hauteur;

    /**
     * @param $largeur
     *
     * @param $hauteur
     */
    public function __construct($largeur, $hauteur)
    {
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
    }


    public function AjouterFigure(IFigure $f){
        $this->figures[]=$f;
    }


    public function GenererHTMLetJS(){
        ?>
        <canvas id="myCanvas" width="<?php echo $this->largeur ?>" height="<?php echo $this->hauteur ?>" style="border:1px solid #c3c3c3;">
            Your browser does not support the canvas element.
        </canvas>
        <?php
        foreach ($this->figures as $f){
            $f->DessinerHtml();
        }
    }
}