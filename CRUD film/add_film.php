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
    $film = $xml->addChild('Film');
    $id = uniqid(); // Générer un ID unique
    $film->addAttribute('id', $id); // Ajouter un ID au film

    $film->addChild('Titre', $titre);
    $film->addChild('Duree', $duree);
    $film->addChild('Genre', $genre);
    $film->addChild('Realisateur', $realisateur);
    $film->addChild('Annee', $annee);
    $film->addChild('Synopsis', $synopsis);

    // Sauvegarder les modifications dans le fichier XML
    saveXMLData($xml);

    // Redirection vers la page d'accueil avec un message dans l'URL
    header("Location: http://localhost/projetXML/eeee.php");
    exit();
}
?>
