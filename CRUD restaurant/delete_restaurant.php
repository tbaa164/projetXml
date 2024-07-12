<?php
// Vérifier si la méthode de requête est POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    die(json_encode(array('error' => 'Méthode non autorisée.')));
}

// Récupérer les données JSON de la requête
$rawData = file_get_contents("php://input");

// Ajout des journaux de débogage pour les données brutes reçues
error_log('Données brutes reçues: ' . $rawData);

$data = json_decode($rawData);

// Vérifier si les données JSON sont correctement décodées
if ($data === null) {
    http_response_code(400);
    die(json_encode(array('error' => 'Erreur lors du décodage des données JSON.')));
}

// Vérifier si l'ID du restaurant est fourni dans la requête POST
if (!isset($data->id) || empty($data->id)) {
    http_response_code(400);
    die(json_encode(array('error' => 'ID de restaurant manquant.')));
}

$id = $data->id;

// Chemin vers le fichier XML
$xmlFilePath = '../xml/restaurants.xml';

// Ajout des journaux de débogage
error_log('Chemin vers le fichier XML: ' . $xmlFilePath);

// Vérifier si le fichier XML est accessible en écriture
if (!is_writable($xmlFilePath)) {
    error_log('Erreur: Le fichier XML des restaurants n\'est pas accessible en écriture.');
    http_response_code(500);
    die(json_encode(array('error' => 'Le fichier XML des restaurants n\'est pas accessible en écriture.')));
}

// Charger le fichier XML des restaurants
$restaurants = simplexml_load_file($xmlFilePath);

// Vérifier si le chargement du fichier XML a échoué
if ($restaurants === false) {
    error_log('Erreur: Problème lors du chargement du fichier XML.');
    http_response_code(500);
    die(json_encode(array('error' => 'Erreur lors du chargement du fichier XML des restaurants.')));
}

// Recherche du restaurant par son ID pour la suppression
$restaurantFound = false;
foreach ($restaurants->restaurant as $key => $restaurant) {
    if ((string) $restaurant['id'] === $id) {
        unset($restaurants->restaurant[$key]);
        $restaurantFound = true;
        error_log('Restaurant trouvé et supprimé.');
        break;
    }
}

// Vérifier si le restaurant a été trouvé et supprimé
if (!$restaurantFound) {
    error_log('Erreur: Restaurant non trouvé.');
    http_response_code(404);
    die(json_encode(array('error' => 'Restaurant non trouvé pour la suppression.')));
}

// Sauvegarde des modifications dans le fichier XML
if ($restaurants->asXML($xmlFilePath)) {
    error_log('Fichier XML sauvegardé avec succès.');
    header('Content-Type: application/json');
    echo json_encode(array('success' => true, 'message' => 'Restaurant supprimé avec succès.'));
} else {
    error_log('Erreur: Problème lors de la sauvegarde du fichier XML.');
    http_response_code(500);
    die(json_encode(array('error' => 'Erreur lors de la sauvegarde du fichier XML des restaurants.')));
}
?>
