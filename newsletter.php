<?php
$email = null;
$success = null;
$error = null;
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $success = "Votre email a bien été enregistré";
        $email = null;
    } else {
        $error = "Email invalide";
    }
}

require 'elements/header.php';
?>

<main class="container">
    <h1>Inscription à la newsletter</h1>

    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos harum beatae qui soluta laboriosam nesciunt consequuntur voluptates veritatis ea commodi fugiat, tempore ullam eum dolorem, recusandae quas in, ratione saepe.
    </p>

    <?php if ($error) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <?php if ($success) : ?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <form action="/newsletter.php" method="POST" class="form-inline">
        <div class="form-group">
            <input type="email" name="email" placeholder="Entrez votre email" class="form-control" required value="<?= htmlentities($email) ?>">
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</main>

<?php
require 'elements/footer.php';
?>
