<?php
$nomDuDossier = filter_input(INPUT_POST,"nomDuDossier");
if (!is_dir("../photos/$nomDuDossier")) mkdir("../photos/$nomDuDossier");

header("location: ../dossier.php?$nomDuDossier");