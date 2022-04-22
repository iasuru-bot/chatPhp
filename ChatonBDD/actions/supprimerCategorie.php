<?php

//verification du token
session_start();
if ($_SESSION["token"] != filter_input(INPUT_POST, "token")) {
    die("vilain pirate");
} else $_SESSION["token"] = uniqid();

$id = filter_input(INPUT_POST,"id");

include_once "../config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

$req = $pdo->prepare("DELETE FROM categories WHERE id=:id");
$req->bindParam(":id",$id);
$req->execute();

header("location: ../index.php");
