<?php
include '../config/xml_film_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $duree = $_POST['duree'];
    $genre = $_POST['genre'];
    $realisateur = $_POST['realisateur'];
    $langue_diffusion = $_POST['langue_diffusion'];
    $annee = $_POST['annee'];
    $synopsis = $_POST['synopsis'];
    $acteurs = explode(',', $_POST['acteurs']); // Convertir la chaîne en tableau
    $presse = $_POST['presse'];
    $spectateurs = $_POST['spectateurs'];
    $horaires = $_POST['horaires'];

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
    $film->addChild('LangueDiffusion', $langue_diffusion);
    $film->addChild('Annee', $annee);
    $film->addChild('Synopsis', $synopsis);

    // Ajouter les acteurs
    $acteursNode = $film->addChild('Acteurs');
    foreach ($acteurs as $acteur) {
        $acteursNode->addChild('Acteur', trim($acteur));
    }

    // Ajouter les notes
    $notesNode = $film->addChild('Notes');
    $notesNode->addChild('Presse', $presse);
    $notesNode->addChild('Spectateurs', $spectateurs);

    // Ajouter les horaires
    $horairesNode = $film->addChild('Horaires');
    $jours = explode(',', $horaires);
    foreach ($jours as $jour) {
        list($nomJour, $heures) = explode(':', $jour);
        $jourNode = $horairesNode->addChild('Jour');
        $jourNode->addAttribute('nom', trim($nomJour));
        $heures = explode(';', $heures);
        foreach ($heures as $heure) {
            $jourNode->addChild('Heure', trim($heure));
        }
    }

    // Sauvegarder les modifications dans le fichier XML
    saveXMLData($xml);

    // Redirection vers la page d'accueil avec un message dans l'URL
    // header("Location: http://localhost/projetXML/Admin/tableau_film.php");
    header("Location: http://localhost/CrudFilmRestau/Admin/tableau_film.php");
    exit();
}
?>
