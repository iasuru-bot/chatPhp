<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f0a61fdca5.js" crossorigin="anonymous"></script>

    <title>test geometrie</title>
</head>
<body>
<?php

spl_autoload_register(function ($class_name) {
    include_once $class_name . '.php';
});

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
$cercle = new Cercle( new Point(400,400),50);

$liste = new GenerateurCanvas(500,500);
$liste->AjouterFigure($quadri);
$liste->AjouterFigure($triangle);
$liste->AjouterFigure($cercle);
$liste->GenererHTMLetJS();
$liste->GenererTab();

?>

</body>
</html>
