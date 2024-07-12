<?php
// Inclure la configuration XML et les fonctions nécessaires
include '../config/xml_film_config.php';

// Vérifier si l'ID du film est fourni dans la requête GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Paramètre ID manquant ou non valide.']);
    exit();
}

$id = $_GET['id'];

// Charger le fichier XML des films
$films = simplexml_load_file('../xml/films.xml');

// Vérifier si le chargement du fichier XML a échoué
if ($films === false) {
    http_response_code(500);
    echo json_encode(['message' => 'Erreur lors du chargement du fichier XML des films.']);
    exit();
}

// Rechercher le film par son ID (en utilisant un XPath pour un meilleur contrôle)
$filmFound = $films->xpath("/Films/Film[@id='$id']");

// Vérifier si le film a été trouvé
if (empty($filmFound)) {
    http_response_code(404);
    echo json_encode(['message' => 'Film non trouvé.']);
    exit();
}

// Récupérer le premier élément trouvé (normalement unique)
$film = $filmFound[0];

// Préparer les données du film à retourner
$filmData = [
    'id' => (string)$film['id'],
    'Titre' => (string)$film->Titre,
    'Duree' => (string)$film->Duree,
    'Genre' => (string)$film->Genre,
    'Realisateur' => (string)$film->Realisateur,
    'LangueDiffusion' => (string)$film->LangueDiffusion,
    'Annee' => (int)$film->Annee,
    'Synopsis' => (string)$film->Synopsis,
    'acteurs' => (string)$film->acteurs,
    'presse' => (string)$film->Presse,
    'spectateurs' => (string)$film->Spectateurs,
    'horaires' => (string)$film->Horaires
];

// Retourner les données du film au format JSON
header('Content-Type: application/json');
echo json_encode($filmData);
?>
