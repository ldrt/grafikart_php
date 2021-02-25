<?php 
$horaires = [];
$ouverture = null;
$fermeture = null;
$input = null;
$ouvert = null;
while (true) {
    $ouverture = (int) readline('Ouverture : ');
    $fermeture = (int) readline('Fermeture : ');
    while ($fermeture <= $ouverture) {
        $fermeture = (int) readline('Fermeture : ');
        echo "Le magasin fermé après l\'ouverture. \n";
    }
    $horaires[] = [
        "ouverture" => $ouverture,
        "fermeture" => $fermeture
    ];
    $nouveauCreneau = (string) readline('Nouveau creneau ? (o/n) ');
    if ($nouveauCreneau === 'n') {
        break;
    }
}

echo 'Le magasin est ouvert de ';
foreach ($horaires as $i => $horaire) {
    if ($i > 0 ) {
        echo ' et de ';
    }
    echo "{$horaire['ouverture']}h à {$horaire['fermeture']}h";
}

$input = readline("\n Ouvert ? ");
foreach ($horaires as $horaire) {
    if ($input >= $horaire['ouverture'] && $input <= $horaire['fermeture']) {
        $ouvert = true;
        break;
    }
}
if ($ouvert) {
    echo 'Ouvert';
} else {
    echo 'Fermé';
}
?>
