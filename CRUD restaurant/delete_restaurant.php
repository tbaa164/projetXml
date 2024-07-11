<?php
// Inclure la configuration XML et les fonctions nécessaires
include '../config/xml_restaurant_config.php';

// Vérifier si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    die('Méthode non autorisée.');
}

// Vérifier si l'ID du restaurant est fourni dans la requête POST
if (!isset($_POST['id']) || empty($_POST['id'])) {
    http_response_code(400);
    die('Erreur : ID de restaurant manquant.');
}

$id = $_POST['id'];

// Charger le fichier XML des restaurants
$restaurants = simplexml_load_file('../xml/restaurants.xml');

// Recherche du restaurant par son ID pour la suppression
$restaurantFound = false;
foreach ($restaurants->restaurant as $key => $restaurant) {
    if ((string) $restaurant->attributes()->id === $id) {
        unset($restaurants->restaurant[$key]);
        $restaurantFound = true;
        break;
    }
}

// Vérifier si le restaurant a été trouvé et supprimé
if (!$restaurantFound) {
    http_response_code(404);
    die('Erreur : Restaurant non trouvé pour la suppression.');
}

// Sauvegarde des modifications dans le fichier XML
$restaurants->asXML('../xml/restaurants.xml');

// Réponse de succès
echo json_encode(array('message' => 'Restaurant supprimé avec succès.'));
?>
