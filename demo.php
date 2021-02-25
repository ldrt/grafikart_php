<?php 
declare(strict_types=1); // typage strict
require_once 'functions.php'; // include: ne bloque pas l'exécution du script

$creneaux = demander_creneaux();
var_dump($creneaux);
?>
