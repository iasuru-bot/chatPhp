<?php

//verification du token
session_start();
if ($_SESSION["token"] != filter_input(INPUT_POST, "token")) {
    die("vilain pirate");
} else $_SESSION["token"] = uniqid();

$titre = filter_input(INPUT_POST,"titre");
$description = filter_input(INPUT_POST,"description");
$id = filter_input(INPUT_POST,"id");

include_once "../config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

$req = $pdo->prepare("UPDATE categories SET titre = :titre, description= :description WHERE id=:id");

$req->bindParam(":titre",$titre);
$req->bindParam(":description",$description);
$req->bindParam(":id",$id);
$req->execute();

header("location: ../index.php");
