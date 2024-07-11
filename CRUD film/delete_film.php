<?php
include '../config/xml_film_config.php';

// Supprimer un film spécifique par son ID du fichier XML
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filmId = $_POST['id'];
    $films = simplexml_load_file($filmsPath);

    $filmToRemove = null;
    foreach ($films->film as $index => $film) {
        if ((int)$film->id === (int)$filmId) {
            $filmToRemove = $film;
            unset($films->film[$index]);
            break;
        }
    }

    if ($filmToRemove) {
        file_put_contents($filmsPath, $films->asXML());
        http_response_code(204); // Réponse OK, pas de contenu
    } else {
        http_response_code(404); // Film non trouvé
        echo json_encode(['message' => 'Film non trouvé.']);
    }
} else {
    http_response_code(405); // Méthode non autorisée
    echo json_encode(['message' => 'Méthode non autorisée.']);
}
?>
