<?php
// Inclure la configuration XML et les fonctions nécessaires
include '../config/xml_restaurant_config.php';

// Vérifier la méthode de la requête HTTP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $restaurateur = htmlspecialchars($_POST['restaurateur']);
    $description = htmlspecialchars($_POST['description']);

    // Charger le fichier XML existant ou créer une nouvelle structure si inexistant
    $xml = loadXMLData();

    // Vérifier si un ID est passé en paramètre pour la modification
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Recherche du restaurant par son ID pour la modification
        $restaurantToUpdate = null;
        foreach ($xml->restaurant as $restaurant) {
            if ($restaurant->attributes()->id == $id) {
                $restaurantToUpdate = $restaurant;
                break;
            }
        }

        // Vérifier si le restaurant à mettre à jour existe
        if ($restaurantToUpdate) {
            $restaurantToUpdate->nom = $nom;
            $restaurantToUpdate->adresse = $adresse;
            $restaurantToUpdate->restaurateur = $restaurateur;
            $restaurantToUpdate->description = $description;

            // Sauvegarder les modifications dans le fichier XML
            saveXMLData($xml);

            // Redirection vers la page de gestion des restaurants avec un message
            header("Location: http://localhost/XMLProject/projetXml/Admin/tableau_restaurant.php?message=Restaurant+modifié+avec+succès");
            exit();
        } else {
            die('Erreur : Restaurant non trouvé pour la modification.');
        }
    } else {
        // Ajouter un nouvel élément restaurant
        $restaurant = $xml->addChild('restaurant');
        $id = uniqid(); // Générer un ID unique
        $restaurant->addAttribute('id', $id); // Ajouter un ID au restaurant

        $restaurant->addChild('nom', $nom);
        $restaurant->addChild('adresse', $adresse);
        $restaurant->addChild('restaurateur', $restaurateur);
        $restaurant->addChild('description', $description);

        // Sauvegarder les modifications dans le fichier XML
        saveXMLData($xml);

        // Redirection vers la page de gestion des restaurants avec un message
        header("Location: http://localhost/XMLProject/projetXml/Admin/tableau_restaurant.php?message=Restaurant+ajouté+avec+succès");
        exit();
    }
}
?>