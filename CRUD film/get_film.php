<?php
include '../config/xml_film_config.php';

// Vérifiez si l'ID est passé en paramètre et est numérique
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Charger le fichier XML
    $films = simplexml_load_file('../xml/films.xml');

    // Recherche du film par son ID
    $filmFound = null;
    foreach ($films->Film as $film) {
        if ((int)$film->id === (int)$id) {
            $filmFound = $film;
            break;
        }
    }

    // Vérifier si le film a été trouvé
    if ($filmFound) {
        // Construire un tableau associatif pour renvoyer en JSON
        $filmData = [
            'id' => (int)$filmFound->id,
            'Titre' => (string)$filmFound->Titre,
            'Duree' => (string)$filmFound->Duree,
            'Genre' => (string)$filmFound->Genre,
            'Realisateur' => (string)$filmFound->Realisateur,
            'Annee' => (int)$filmFound->Annee,
            'Synopsis' => (string)$filmFound->Synopsis,
            'Acteurs' => (string)$filmFound->Acteurs,
            'Presse' => (string)$filmFound->Presse,
            'Spectateurs' => (string)$filmFound->Spectateurs,
            'Horaires' => (string)$filmFound->Horaires
        ];

        // Renvoyer les données du film en JSON
        header('Content-Type: application/json');
        echo json_encode($filmData);
        exit();
    } else {
        // Si le film n'est pas trouvé, renvoyer une erreur
        http_response_code(404);
        echo json_encode(['message' => 'Film non trouvé.']);
        exit();
    }
} else {
    // Si l'ID n'est pas passé en paramètre ou n'est pas numérique
    http_response_code(400);
    echo json_encode(['message' => 'Paramètre ID manquant ou non valide.']);
    exit();
}
?>
