<?php
session_start();
$token=uniqid();
$_SESSION["token"]=$token;


//Jamais de variable récupérer dans un get directement dans un echo
//On utilise un htmlentities pour convertir en html direct.
$d=filter_input(INPUT_GET,"d");

//testons l'existence du dossier
if(!is_dir("Photos/$d")){
    //renvoyer une erreur 404
    http_response_code(404);
    die();
}



$title= "Les chatons du dossier $d!";
include "header.php";
?>


<h1>Les chatons du dossier <?php echo htmlentities($d)?>!</h1>

<div class="container">
    <div class="row">
        <?php
        $images = scandir("Photos/$d");
        foreach ($images as $image) {
            if ($image!="." && $image!=".."&& is_file("Photos/$d/$image")){
                ?>
                <div class="col col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo "Photos/$d/$image"?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">There is a cat.</p>
                        </div>
                        <form method="post" action="actions/supprimerChaton.php">
                            <input type="hidden" name="token" value="<?php echo $token?>">
                            <input type="hidden" name="d" value="<?php echo $d?>">
                            <input type="hidden" name="image" value="<?php echo $image?>">
                            <input type="submit" onclick="return confirm('Etes vous sur ?');" style="background-color: darkred" value="X"/>
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <form method="post" action="actions/ajouterChaton.php" enctype="multipart/form-data">
        <h2>Ajouter un chaton</h2>
        <input type="file" required accept=".jpg,.gif,.png,.jfif" name="fichier"/>
        <input type="hidden" name="nomDuDossier" value="<?php echo $d?>" />
        <input type="hidden" name="token" value="<?php echo $token?>">
        <input type="submit" value="OK"/>
    </form>
</div>


<?php
include "footer.php";
?>
