<?php
$aDeviner = 150;
$erreur = null;
$succes = null;
$value = null;
if(isset($_POST['chiffre'])){ 
    $value = (int) $_POST['chiffre'];
    if($value > $aDeviner) {
        $erreur='Votre chiffre est trop grand';
    } elseif ($value < $aDeviner) {
        $erreur='Votre chiffre est trop petit';
    } else {
        $succes="Bravo, vous avez bien deviné le chiffre $aDeviner";
    }
}
require 'header.php';
?>

<main class="container">
    <?php if($erreur) {?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
    <?php } elseif ($succes) { ?>
    <div class="alert alert-success">
        <?= $succes ?>
    </div>
    <?php } ?>

    <form action="/jeu.php" method="POST">
        <div class="form-group">
                <input class="form-control" type="number" name="chiffre" placeholder="Entre 0 et 1000" value="<?= $value ?>">
                <button class="btn btn-primary" type="submit">Deviner</button>
        </div>
    </form>
</main>

<?php
require 'footer.php';
?>