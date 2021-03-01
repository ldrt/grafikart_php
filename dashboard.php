<?php 
require_once 'functions/auth.php'; 
forcer_utilisateur_connecte();
require_once 'functions/compteur.php'; 
$annee = (int) date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int) $_GET['annee'];
$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre',
];
$mois_selection = empty($_GET['mois']) ? null : $_GET['mois'];
if($annee_selection && $mois_selection) {
    $total = nombre_vues_mois($annee_selection, $mois_selection);
    $details = nombre_vues_detail_mois($annee_selection, $mois_selection);
} else {
    $total = nombre_vues();
}
require_once 'elements/header.php'; 
?>

<main class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <a class="list-group-item <?= $annee - $i === $annee_selection ? 'active' : ''; ?>" href="dashboard.php?annee=<?= $annee -$i ?>">
                    <?= $annee -$i ?>
                </a>
                <?php if($annee - $i === $annee_selection) : ?>
                    <div class="list-group">
                    <?php foreach($mois as $k => $m) : ?>
                        <a class="list-group-item <?= $k === $mois_selection ? 'active' : ''; ?>" href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $k ?>">
                        <?= $m ?>
                        </a>
                    <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <strong style="font-size:3em;"><?= $total ?></strong><br>
                    visite<?= $total > 1 ? 's' : '' ?> totale
                </div>
            </div>
            <?php if (isset($details)) : ?>
                <h2>Détail des visites pour le mois</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Jour</th>
                            <th>Nb visites</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($details as $ligne) : ?>
                        <tr>
                            <td><?= $ligne['jour'] ?></td>
                            <td><?= $ligne['visites'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php 
require 'elements/footer.php'; 
?>