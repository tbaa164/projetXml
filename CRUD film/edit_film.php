<?php
include '../config/xml_film_config.php';

// Gestion de la modification d'un film
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifiez si l'ID est numérique et valide
    if (!is_numeric($id)) {
        die('Erreur : ID de film non valide.');
    }

    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $duree = $_POST['duree'];
    $genre = $_POST['genre'];
    $realisateur = $_POST['realisateur'];
    $annee = $_POST['annee'];
    $synopsis = $_POST['synopsis'];

    // Validation des données (assurez-vous qu'aucun champ n'est vide par exemple)
    if (empty($titre) || empty($duree) || empty($genre) || empty($realisateur) || empty($annee) || empty($synopsis)) {
        die('Erreur : Les données du film sont incomplètes.');
    }

    // Traitement de la modification du film dans le fichier XML (exemple)
    $films = simplexml_load_file('../xml/films.xml');

    // Recherche du film par son ID pour la modification
    $filmFound = false;
    foreach ($films->Film as $film) {
        if ($film->id == $id) {
            $film->Titre = $titre;
            $film->Duree = $duree;
            $film->Genre = $genre;
            $film->Realisateur = $realisateur;
            $film->Annee = $annee;
            $film->Synopsis = $synopsis;
            $filmFound = true;
            break;
        }
    }

    if (!$filmFound) {
        die('Erreur : Film non trouvé pour la modification.');
    }

    // Sauvegarde des modifications dans le fichier XML
    $films->asXML('../xml/films.xml');

    // Réponse de succès
    echo json_encode(array('message' => 'Film modifié avec succès.'));
    exit();
}
?>
