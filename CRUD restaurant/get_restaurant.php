<?php
// Inclure la configuration XML et les fonctions nécessaires
include '../config/xml_restaurant_config.php';

// Vérifier si l'ID du restaurant est fourni dans la requête GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    die('Erreur : ID de restaurant manquant.');
}

$id = $_GET['id'];

// Charger le fichier XML des restaurants
$restaurants = simplexml_load_file('../xml/restaurants.xml');

// Rechercher le restaurant par son ID
$restaurantFound = null;
foreach ($restaurants->restaurant as $restaurant) {
    if ((string) $restaurant->attributes()->id === $id) {
        $restaurantFound = $restaurant;
        break;
    }
}

// Vérifier si le restaurant a été trouvé
if (!$restaurantFound) {
    http_response_code(404);
    die('Erreur : Restaurant non trouvé.');
}

// Préparer les données du restaurant à retourner
$restaurantData = [
    'id' => (string) $restaurantFound->attributes()->id,
    'Nom' => (string) $restaurantFound->nom,
    'Adresse' => (string) $restaurantFound->adresse,
    'Restaurateur' => (string) $restaurantFound->restaurateur,
    'Description' => (string) $restaurantFound->description
];

// Retourner les données du restaurant au format JSON
header('Content-Type: application/json');
echo json_encode($restaurantData);
?>
