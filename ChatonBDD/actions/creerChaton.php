<?php

//verification du token
session_start();
if ($_SESSION["token"] != filter_input(INPUT_POST, "token")) {
    die("vilain pirate");
} else $_SESSION["token"] = uniqid();

$dateNaissance = filter_input(INPUT_POST,"dateNaissance");
$nom = filter_input(INPUT_POST,"nom");
$idCategorie = filter_input(INPUT_POST,"idCategorie");
$photo = filter_input(INPUT_POST,"photo");


//récupération de la photo
$uploaddir = "../Photos/";
$uploadfile = $uploaddir . basename($_FILES['fichier']['name']);
move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile);

include_once "../config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

$req = $pdo->prepare("INSERT INTO chatons(nom,dateDeNaissance,id_categorie,photo) VALUES (:nom ,:dateDeNaissance,:id_categorie,:photo )");

$req->bindParam(":nom",$nom);
$req->bindParam(":dateDeNaissance",$dateNaissance);
$req->bindParam(":id_categorie",$idCategorie);
$req->bindValue(":photo", basename($_FILES['fichier']['name']));

$req->execute();

header("location: ../categorie.php?id=$idCategorie");




