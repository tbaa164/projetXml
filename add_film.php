<?php
include 'config/xml_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $duree = $_POST['duree'];
    $genre = $_POST['genre'];
    $realisateur = $_POST['realisateur'];
    $annee = $_POST['annee'];
    $synopsis = $_POST['synopsis'];

    // Charger le fichier XML existant ou créer une nouvelle structure si inexistant
    $xml = loadXMLData();

    // Créer un nouvel élément film
    $film = $xml->addChild('film');
    $id = uniqid(); // Générer un ID unique
    $film->addAttribute('id', $id); // Ajouter un ID au film

    $film->addChild('titre', $titre);
    $film->addChild('duree', $duree);
    $film->addChild('genre', $genre);
    $film->addChild('realisateur', $realisateur);
    $film->addChild('annee', $annee);
    $film->addChild('synopsis', $synopsis);

    // Sauvegarder les modifications dans le fichier XML
    saveXMLData($xml);

    // Redirection vers la page d'accueil avec un message dans l'URL
    header("Location: http://localhost/CrudFilmRestau/eeee.php#message=Nouveau%20film%20ajouté%20avec%20succès");
    exit();
}
?>