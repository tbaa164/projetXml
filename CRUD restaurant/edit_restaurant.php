<?php
// Inclure la configuration XML et les fonctions nécessaires
include '../config/xml_restaurant_config.php';

// Vérifier si l'ID du restaurant est fourni dans la requête GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    die('Erreur : ID de restaurant manquant.');
}

$id = $_GET['id'];

// Vérifier si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    die('Méthode non autorisée.');
}

// Récupération des données du formulaire
$nom = htmlspecialchars($_POST['nom']);
$adresse = htmlspecialchars($_POST['adresse']);
$restaurateur = htmlspecialchars($_POST['restaurateur']);
$description = htmlspecialchars($_POST['description']);

// Validation des données
if (empty($nom) || empty($adresse) || empty($restaurateur) || empty($description)) {
    http_response_code(400);
    die('Erreur : Les données du restaurant sont incomplètes.');
}

// Charger le fichier XML des restaurants
$restaurants = simplexml_load_file('../xml/restaurants.xml');

// Recherche du restaurant par son ID pour la modification
$restaurantFound = false;
foreach ($restaurants->restaurant as $restaurant) {
    if ((string) $restaurant->attributes()->id === $id) {
        $restaurant->nom = $nom;
        $restaurant->adresse = $adresse;
        $restaurant->restaurateur = $restaurateur;
        $restaurant->description = $description;
        $restaurantFound = true;
        break;
    }
}

// Vérifier si le restaurant a été trouvé et modifié
if (!$restaurantFound) {
    http_response_code(404);
    die('Erreur : Restaurant non trouvé pour la modification.');
}

// Sauvegarde des modifications dans le fichier XML
$restaurants->asXML('../xml/restaurants.xml');

// Réponse de succès
echo json_encode(array('message' => 'Restaurant modifié avec succès.'));

header("Location: http://localhost/updateXML/projetXml/Admin/tableau_restaurant.php");

?>
