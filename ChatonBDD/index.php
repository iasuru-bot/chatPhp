<?php
session_start();
$token=uniqid();
$_SESSION["token"]=$token;
$title= "Gestion des gros CHATONS";
include "header.php";
?>


<div class="container">
    <h1>Bienvenue sur la gestion des chatons. Les chiens ne sont pas acceptés ici!</h1>

    <table class="table talbe-striped">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th></th>
        </tr>
        <?php
        include_once "config.php";

        $pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

        $req = $pdo->prepare("SELECT * FROM categories");

        $req->execute();
        $lignes = $req->fetchAll();

        foreach ($lignes as $l){?>
            <tr>
                <th><?php echo htmlentities($l['titre'])?></th>
                <th><?php echo htmlentities($l['description'])?></th>
                <th><a href="modifierCategorie.php?id=<?php echo $l["id"]?>" class="btn btn-success">Modifier</a></th>
            </tr>
        <?php }
        ?>


    </table>



    <form method="post" action="actions/creerCategorie.php">
        <h2>Ajouter une catégorie</h2>
        Titre : <input type="text" required name="titre" maxlength="100"/>
        <br>
        Description : <textarea cols="80" rows="5" name="description"></textarea>
        <br>
        <input type="submit" value="OK"/>
        <input type="hidden" name="token" value="<?php echo $token?>">
    </form>


</div>

<?php
include "footer.php";
?>
