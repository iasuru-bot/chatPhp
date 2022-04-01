<?php
//verification du token
session_start();
if($_SESSION["token"] != filter_input(INPUT_POST,"token")){
    die("vilain pirate");
}
else $_SESSION["token"]=uniqid();



$nomDuDossier = filter_input(INPUT_POST,"nomDuDossier");
if (!is_dir("../photos/$nomDuDossier")) mkdir("../photos/$nomDuDossier");

header("location: ../dossier.php?$nomDuDossier");