<?php
//verification du token
session_start();
$token=uniqid();
$_SESSION["token"]=$token;
$title= "Gestion des gros CHATONS";
include "header.php";

$id = filter_input(INPUT_GET,"id");

include_once "config.php";

$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

$req = $pdo->prepare("SELECT * FROM categories WHERE id=:id");
$req->bindParam(":id",$id);

$req->execute();

$lignes = $req->fetchAll();
if (count($lignes)!=1){
    http_response_code(404);
    die;
}
foreach ($lignes as $l){?>

        <form method="post" action="actions/supprimerCategorie.php">
            <h2>Etes-vous sur de vouloir supprimer <i><?php echo $l["titre"]?> ?</i></h2>
            <a href="index.php" class="btn btn-danger">Annuler</a>
            <input type="submit" value="Valider" class="btn btn-warning"/>
            <input type="hidden" name="token" value="<?php echo $token?>">
            <input type="hidden" name="id" value="<?php echo $id?>">
        </form>

<?php }
?>


