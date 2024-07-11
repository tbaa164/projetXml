<?php
// Vérification de la méthode d'envoi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $genre = $_POST['genre'];
    $realisateur = $_POST['realisateur'];
    
    // Exemple de validation : vérification si les données ne sont pas vides
    // if (empty($id) || empty($titre) || empty($genre) || empty($realisateur)) {
    if (empty($titre) || empty($genre) || empty($realisateur)) {
        die('Erreur : Tous les champs sont obligatoires.');
    }
    
    // Exemple de traitement : sauvegarde dans un fichier XML
    $films = simplexml_load_file('films.xml'); // Chargement du fichier XML
    
    // Recherche du film par son ID pour la modification
    $updated = false;
    foreach ($films->film as $film) {
        if ($film->id == $id) {
            $film->titre = $titre;
            $film->genre = $genre;
            $film->realisateur = $realisateur;
            $updated = true;
            break;
        }
    }
    
    if (!$updated) {
        // Si le film n'existe pas, gestion de l'ajout ici (non inclus dans cet exemple)
        die('Erreur : Film non trouvé pour modification.');
    }
    
    // Sauvegarde des modifications dans le fichier XML
    $films->asXML('films.xml'); // Sauvegarde des modifications dans le fichier XML
    
    // Redirection vers une page de succès ou de retour
    header('Location: index.php'); // Remplacez par votre page souhaitée
    exit();
} else {
    die('Méthode non autorisée.');
}
?>
