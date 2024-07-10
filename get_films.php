<?php
include 'config/xml_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Charger le fichier XML
    $xml = loadXMLData();

    $films = [];

    foreach ($xml->film as $film) {
        $filmData = [
            'id' => (int)$film['id'],
            'Titre' => (string)$film->titre,
            'Duree' => (string)$film->duree,
            'Genre' => (string)$film->genre,
            'Realisateur' => (string)$film->realisateur,
            'Annee' => (string)$film->annee,
            'Synopsis' => (string)$film->synopsis
        ];

        $films[] = $filmData;
    }

    echo json_encode($films);
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Méthode non autorisée."));
}
?>
