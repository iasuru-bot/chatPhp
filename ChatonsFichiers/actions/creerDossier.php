<?php
$nomDuDossier = filter_input(INPUT_POST,"nmoDuDossier");
if (is_dir("../photos/$nomDuDossier")) mkdir("../photos/$nomDuDossier");