<?php
$erreur = null;
if(!empty($_POST['pseudo'] && !empty($_POST['mdp']))) {
    if ($_POST['pseudo'] === 'John' && $_POST['mdp'] === 'Doe') {
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /dashboard.php');
        exit();
    } else {
        $erreur = "Identifiants incorrect";
    }
}
require_once 'functions/auth.php';
if(est_connecte()){
    header('Location: /dashboard.php');
    exit();
}
require_once 'elements/header.php'; 
?>

<?php if ($erreur) : ?>
<div class="alert alert-danger">
    <?= $erreur ?>
</div>
<?php endif ?>

<main class="container">
    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" type="text" name="pseudo" placeholder="nom utilisateur">
            <div class="form-group">
                <input class="form-control" type="password" name="mdp" placeholder="mot de passe">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</main>

<?php
require_once 'elements/footer.php'; 
?>