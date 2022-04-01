<?php
$title= "Gestion des gros CHATONS";
include "header.php";
?>


<h1>Bienvenue sur la gestion des chatons. Les chiens ne sont pas acceptés ici!</h1>
<div class="container">
    <form method="post" action="actions/creerDossier.php">
        <h2>Ajouter un dossier</h2>
        <input type="text" required name="nomDuDossier" placeholder="Nom Dossier"/>
        <input type="submit" value="OK"/>
    </form>

</div>

<?php
include "footer.php";
?>
