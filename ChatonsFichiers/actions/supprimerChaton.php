<?php
$d = filter_input(INPUT_POST,"d");
$image = filter_input(INPUT_POST,"image");

session_start();
if($_SESSION["token"] != filter_input(INPUT_POST,"token")){
    die("vilain pirate");
}
else $_SESSION["token"]=uniqid();



unlink("../Photos/$d/$image");
header("location: ../dossier.php?d=$d");
