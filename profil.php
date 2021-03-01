<?php
$user = null;
// use serialize/unserialize if needed
if (!empty($_GET['action']) && $_GET['action']) {
    unset($_COOKIE['utilisateur']); // delete val of var COOKIE
    setcookie('utilisateur', '', time() - 10); // delete cookie in browser
}
if (!empty($_COOKIE['utilisateur'])) {
    $nom = $_COOKIE['utilisateur'];
}

if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $_COOKIE['utilisateur'] = $_POST['nom']; // to avoid reloading to see value
    $nom = $_COOKIE['utilisateur'];
}
require 'elements/header.php'; 
?>

<main class="container">
    <?php if ($nom) : ?>
    <h1>Bonjour <?= htmlentities($nom) ?></h1>
    <a href="profil.php?action=deconnecter">Se déconnecter</a>
    <?php else : ?>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" placeholder="Entrez votre nom" class="form-control" name="nom">
            </div>
            <button class="btn btn-primary">Se connecter</button>
        </form>
    <?php endif; ?>
</main>

<?php
require 'elements/footer.php'; 
?>