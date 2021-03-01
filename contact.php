<?php 
session_start();
require 'elements/header.php'; 
require_once 'data/config.php'; 
require_once 'functions_site.php'; 
date_default_timezone_set('Europe/Paris');
$heure = (int) ($_GET['heure'] ?? date('G'));
$jour = (int) ($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? 'green' : 'red';
?>

<main class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Debug</h2>
            <pre>
                <?php var_dump($_SESSION); ?>
            </pre>
            <h2>Nous contacter</h2>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis qui vel consectetur, nihil, cumque maiores itaque est, quasi architecto impedit mollitia soluta sequi deserunt. Unde hic ad id tenetur omnis.
            </p>
        </div>
        <div class="col-md-4">
            <h2>Horaires d'ouverture</h2>

            <?php if($ouvert): ?> 
                <div class="alert alert-success">
                    Le magasin sera ouvert
                </div>
            <?php else: ?> 
                <div class="alert alert-danger">
                    Le magasin sera fermé
                </div>
            <?php endif; ?>

            <form action="" method="GET">
                <div class="form-group">
                    <?= select('jour', $jour, JOURS) ?>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name ="heure" value="<?= $heure ?>">
                </div>
                <button class="btn btn-primary" type=submit>Voir si le magasin est ouvert</button>
            </form>

            <ul>
                <?php foreach (JOURS as $k => $jour): ?>
                    <li>
                        <?= $jour ?> :
                        <?= creneaux_html(CRENEAUX[$k]); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</main>

<?php 
require 'elements/footer.php'; 
?>