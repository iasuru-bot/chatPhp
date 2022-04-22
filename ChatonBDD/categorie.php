<?php
//verification du token
session_start();
$token=uniqid();
$_SESSION["token"]=$token;

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
    <h1><?php echo htmlentities($l["titre"])?></h1>

    <form method="post" action="actions/creerChaton.php" enctype="multipart/form-data">
        <h2>Ajouter un chaton</h2>
        <div class="form-group">
            Date de naissance : <input type="date" required name="dateNaissance" class="form-control"/>
        </div>
        <div class="form-group">
            Nom : <input type="text" required name="nom" class="form-control"/>
        </div>
        <div class="form-group">
            Catégorie : <select  required name="idCategorie" class="form-control">
                <?php
                include_once config.php;
                $pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

                $req = $pdo->prepare("SELECT id,titre FROM categories ");
                $req->execute();

                $reponses= $req->fetchAll();
                foreach ($reponses as $r){?>
                    <option value="<?php echo $r["id"] ?>"><?php echo $r["titre"]?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" required name="photo" class="form-control"/>
        </div>
        <input type="submit" value="OK"  class="btn btn-success"/>
        <input type="hidden" name="token" value="<?php echo $token?>">
    </form>

<?php }


?>


