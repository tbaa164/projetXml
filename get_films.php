<?php
include 'config/xml_config.php';

// Charger tous les films à partir du fichier XML
$films = simplexml_load_file($filmsPath);

$jsonData = [];

foreach ($films->film as $film) {
    $jsonData[] = [
        'id' => (int)$film->id,
        'Titre' => (string)$film->titre,
        'Duree' => (string)$film->duree,
        'Genre' => (string)$film->genre,
        'Realisateur' => (string)$film->realisateur,
        'Annee' => (int)$film->annee,
        'Synopsis' => (string)$film->synopsis
    ];
}

header('Content-Type: application/json');
echo json_encode($jsonData);
?>
