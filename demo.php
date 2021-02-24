<?php 
$classe = [
    [
    'nom' => 'Doe',
    'prenom' => 'John', 
    'notes' => [20, 15, 10]
    ],
    [
    'nom' => 'Doe',
    'prenom' => 'Jane', 
    'notes' => [16, 12, 17]
    ]
];

echo $classe[1]['notes'][1];
?>
