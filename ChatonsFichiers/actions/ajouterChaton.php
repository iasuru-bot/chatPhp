<?php

$nomDuDossier = filter_input(INPUT_POST,"nomDuDossier");

$uploaddir = "../Photos/$nomDuDossier/";
$uploadfile = $uploaddir . basename($_FILES['fichier']['name']);

move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile);

header("location: ../dossier.php?d=$nomDuDossier");
?>
