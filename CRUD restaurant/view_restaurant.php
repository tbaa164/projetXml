<?php
// ID du restaurant à afficher (à remplacer par l'ID souhaité)
$restaurantId = "669014b30f28e1";

// Chemin vers le fichier XML
$xmlFilePath = '../xml/restaurants.xml';

// Vérifier si le fichier XML existe
if (!file_exists($xmlFilePath)) {
    die('Le fichier XML des restaurants n\'existe pas.');
}

// Charger le fichier XML des restaurants
$restaurants = simplexml_load_file($xmlFilePath);

// Vérifier si le chargement du fichier XML a échoué
if ($restaurants === false) {
    die('Erreur lors du chargement du fichier XML des restaurants.');
}

// Rechercher le restaurant par son ID
$restaurantFound = null;
foreach ($restaurants->restaurant as $restaurant) {
    if ((string) $restaurant['id'] === $restaurantId) {
        $restaurantFound = $restaurant;
        break;
    }
}

// Vérifier si le restaurant a été trouvé
if (!$restaurantFound) {
    die('Restaurant non trouvé.');
}

// Récupérer les informations du restaurant
$nom = (string) $restaurantFound->nom;
$adresse = (string) $restaurantFound->adresse;
$restaurateur = (string) $restaurantFound->restaurateur;
$description = (string) $restaurantFound->description;

// Affichage des informations du restaurant
echo "<h1>$nom</h1>";
echo "<p><strong>Adresse:</strong> $adresse</p>";
echo "<p><strong>Restaurateur:</strong> $restaurateur</p>";
echo "<p><strong>Description:</strong><br>$description</p>";

// Affichage de la carte du restaurant
echo "<h2>Carte du restaurant</h2>";
echo "<ul>";
foreach ($restaurantFound->carte->plat as $plat) {
    $nomPlat = (string) $plat->nom;
    $partie = (string) $plat->partie;
    $prix = (string) $plat->prix;
    $descriptionPlat = (string) $plat->description;

    echo "<li>";
    echo "<strong>$nomPlat ($partie)</strong>: $descriptionPlat - Prix: $prix";
    echo "</li>";
}
echo "</ul>";

// Affichage des menus du restaurant
echo "<h2>Menus du restaurant</h2>";
echo "<ul>";
foreach ($restaurantFound->menus->menu as $menu) {
    $titreMenu = (string) $menu->titre;
    $prixMenu = (string) $menu->prix;

    echo "<li>";
    echo "<strong>$titreMenu</strong> - Prix: $prixMenu";
    echo "<ul>";
    foreach ($menu->elements->plat as $plat) {
        $nomPlat = (string) $plat->nom;
        $partie = (string) $plat->partie;
        $prix = (string) $plat->prix;
        $descriptionPlat = (string) $plat->description;

        echo "<li>";
        echo "<strong>$nomPlat ($partie)</strong>: $descriptionPlat - Prix: $prix";
        echo "</li>";
    }
    echo "</ul>";
    echo "</li>";
}
echo "</ul>";
?>
