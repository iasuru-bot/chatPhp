<?php

//verification du token
session_start();
if ($_SESSION["token"] != filter_input(INPUT_POST, "token")) {
    die("vilain pirate");
} else $_SESSION["token"] = uniqid();

$titre = filter_input(INPUT_POST,"titre");
$description = filter_input(INPUT_POST,"description");

include_once "../config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

$req = $pdo->prepare("INSERT INTO categories(titre,description) VALUES (:titre ,:description )");

$req->bindParam(":titre",$titre);
$req->bindParam(":description",$description);
$req->execute();

$req->debugDumpParams();

$id=$pdo->lastInsertId();
header("location: ../dossier.php?id=$id");
