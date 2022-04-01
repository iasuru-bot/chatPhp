<?php
$d = filter_input(INPUT_POST,"d");

session_start();
if($_SESSION["token"] != filter_input(INPUT_POST,"token")){
    die("vilain pirate");
}
else $_SESSION["token"]=uniqid();

rmdir("../Photos/$d");
header("location: ../index.php");

