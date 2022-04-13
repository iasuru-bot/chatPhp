<?php
//verification du token
session_start();
$token=uniqid();
$_SESSION["token"]=$token;

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

        <form method="post" action="actions/modifierCategorie.php">
            <h2>Modifier la catégorie</h2>
            Titre : <input type="text" required name="titre" maxlength="100" value="<?php echo htmlentities($l["titre"])?>">
            <br>
            Description : <textarea cols="80" rows="5" name="description" ><?php echo htmlentities($l["description"])?></textarea>
            <br>
            <input type="submit" value="OK"/>
            <input type="hidden" name="token" value="<?php echo $token?>">
            <input type="hidden" name="id" value="<?php echo $id?>">
        </form>

<?php }


?>


