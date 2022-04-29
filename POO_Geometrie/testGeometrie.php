<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test geometrie</title>
</head>
<body>
<?php

include_once "Triangle.php";
include_once "Quadrilatere.php";
include_once "Cercle.php";
include_once "GenerateurCanvas.php";
include_once "Point.php";

//quand plusieurs : use \Geometrie\{point, blabla}
//point avec alias : point as p
use \Geometrie\{Point,Triangle,Quadrilatere, GenerateurCanvas , Cercle};
$p1=new Point(0,0);
/*
$triangle = new Triangle($p1,$p2,$p3);
echo"le triangle " ;
echo $triangle->estIsocele()? "est isocele ": "est pas isocele ";
echo "<br>";
echo $triangle->CalculerAire();*/


$quadri = new Quadrilatere(new Point(10,10),new Point(10,100),new Point(100,100),new Point(100,10));
$triangle = new Triangle(new Point(200,100),new Point(200,200),new Point(300,300));
$cercle = new Cercle( new Point(400,400),70);

$liste = new GenerateurCanvas(500,500);
$liste->AjouterFigure($quadri);
$liste->AjouterFigure($triangle);
$liste->AjouterFigure($cercle);
$liste->GenererHTMLetJS();

?>
</body>
</html>
