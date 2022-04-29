<?php

namespace Geometrie;

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

    public function GenererTab(){?>
    <table class="table table-striped">
        <tr>
            <th>Figure</th>
            <th>Périmètre</th>
            <th>Aire</th>
        </tr>
        <?php foreach ($this->figures as $figure){?>
            <tr>
                <td><?php echo $figure?></td>
                <td><?php echo $figure->CalculerPerimetre() ?></td>
                <td><?php echo $figure->CalculerAire() ?></td>
            </tr>
        <?php }?>
    </table>
    <?php }
}