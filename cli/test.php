<?php
$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'demo.txt';
file_put_contents($fichier, 'Salut les gens');
file_put_contents($fichier, ' !', FILE_APPEND);
echo file_get_contents($fichier);

echo "\n";

$csv = __DIR__ . DIRECTORY_SEPARATOR . 'pokemon_up_gen8.csv';
$resource = fopen($csv, 'r+'); // r readonly r+ read and write
$l = 0;
// fgets returns false at file end
while ($line = fgets($resource)) {
    $l++;
    // get Bulbasaur
    if ($l == 2) {
        echo $line;
        break;
    }
}
fclose($resource);
?>