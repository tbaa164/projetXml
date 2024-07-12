<?php
// Vérification de la méthode d'envoi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $duree = $_POST['duree'];
    $genre = $_POST['genre'];
    $realisateur = $_POST['realisateur'];
    $annee = $_POST['annee'];
    $synopsis = $_POST['synopsis'];
    $acteurs = $_POST['acteurs'];
    $presse = $_POST['presse'];
    $spectateurs = $_POST['spectateurs'];
    $horaires = $_POST['horaires'];
    
    // Exemple de validation : vérification si les données ne sont pas vides
    if (empty($titre) || empty($duree) || empty($genre) || empty($realisateur) || empty($annee) || empty($synopsis) || empty($acteurs) || empty($presse) || empty($spectateurs) || empty($horaires)) {
        die('Erreur : Tous les champs sont obligatoires.');
    }
    
    // Exemple de traitement : sauvegarde dans un fichier XML
    $films = simplexml_load_file('../xml/films.xml'); // Chargement du fichier XML
    
    // Recherche du film par son ID pour la modification
    $updated = false;
    foreach ($films->film as $film) {
        if ($film->id == $id) {
            $film->titre = $titre;
            $film->duree = $duree;
            $film->genre = $genre;
            $film->realisateur = $realisateur;
            $film->annee = $annee;
            $film->synopsis = $synopsis;
            $film->acteurs = $acteurs;
            $film->presse = $presse;
            $film->spectateurs = $spectateurs;
            $film->horaires = $horaires;
            $updated = true;
            break;
        }
    }
    
    if (!$updated) {
        // Si le film n'existe pas, gestion de l'ajout ici (non inclus dans cet exemple)
        die('Erreur : Film non trouvé pour modification.');
    }
    
    // Sauvegarde des modifications dans le fichier XML
    $films->asXML('../xml/films.xml'); // Sauvegarde des modifications dans le fichier XML
    
    // Redirection vers une page de succès ou de retour
    header('Location: index.php'); // Remplacez par votre page souhaitée
    exit();
} else {
    die('Méthode non autorisée.');
}
?>
