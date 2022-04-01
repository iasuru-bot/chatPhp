<!doctype html>
<html lang="fr">
<headzzzzz>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</headzzzzz>
<body>
    <?php
    $p=["zarma","romantique","je","crois", "que", "ca" ,"y" ,"est"];
    for ($i=0;$i<sizeof($p);$i++){
        echo "$p[$i] </br>";
    }
    //concat
    $tt='petit';
    $te=$tt.'zizi';
    $te=$te."$te";
    $te="GOUIGOUI$te<br>";
    echo $te;

    //tableau
    $tab1=array(3,7,9,2);
    $tab2=[3,7,8,9];
    $tab2[]="guigui baise Jeanne";
    echo $tab2[4];

    //pour débuguer
    var_dump($tab2);

    //boucles
    for ($i=0;$i<10;$i++){
        echo "$i<br>";
    }
    echo "<hr>";

    $u=2;
    while ($u<1000){
        echo "$u<br>";
        $u*=2;
    }
    echo "<hr>";

    //elements du tab
    foreach ($p as $value){
        echo "$value<br>";
    }
    echo "<hr>";
    //afficher les keys du tab
    foreach ($p as $key=>$value){
        echo "$key:$value<br>";
    }

    function afficherBonjour(){
        echo "Bonjour<br>";
    }
    //appeld'une fonction
    afficherBonjour();


    function estDivisiblePar($nombre,$diviseur){
        return $nombre%$diviseur==0;
    }

    for($i=0;$i<50;$i++){
        echo estDivisiblePar($i,3)?"$i est divisible par 3<br>"
            :"$i n'est pas divisble par 3<br>";
    }





    //alan@latetedanslatoile.fr







    ?>
</body>
</html>