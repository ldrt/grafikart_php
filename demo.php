<?php 
function repondre ($question) {
    while (true) {
        $reponse = readline($question . "(o)ui/(n)on : ");
        if($reponse === 'o') {
            return true;
        } elseif ($reponse === 'n') {
            return false;
        }
    }
}

function demander_creneaux ($phrase = 'Veuillez entrer un creneau') {
    while (true) {
        echo $phrase . "\n";
        while (true) {
            $ouverture = (int) readline('Ouverture : ');
            // vérification: heure valide
            if ($ouverture >=0 && $ouverture <=23) {
                break;
            }
        }
        while (true) {
            $fermeture = (int) readline('Fermeture : ');
            // vérification: heure valide et fermeture après ouverture
            if ($fermeture >=0 && $fermeture <=23 && $fermeture > $ouverture) {
                break;
            }
        }
        $horaires[] = [
            "ouverture" => $ouverture,
            "fermeture" => $fermeture
        ];
        // vérification: nouveau créneau
        $continuer = repondre('Continuer ?');
        if (!$continuer) {
            return $horaires;
        }
    }
}

$creneaux = demander_creneaux();
var_dump($creneaux);
?>
