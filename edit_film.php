<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Film</title>
</head>
<body>
    <h1>Modifier un Film</h1>
    
    <?php
    // Vérification et récupération de l'id du film à modifier depuis l'URL
    $id = isset($_GET['id']) ? $_GET['id'] : die('Erreur : ID du film non spécifié.');
    
    // Lecture du fichier XML ou autre source de données
    $films = simplexml_load_file('films.xml'); // Remplacez par votre propre chargement de données
    
    // Recherche du film par son ID
    $film = null;
    foreach ($films->film as $f) {
        if ($f->id == $id) {
            $film = $f;
            break;
        }
    }
    
    if ($film) {
        // Affichage du formulaire de modification
        ?>
       <form action="add_edit_film.php" method="POST">
    <input type="hidden" name="id" value="<?= $film->id ?>" />
    Titre: <input type="text" name="titre" value="<?= $film->titre ?>" /><br>
    Genre: <input type="text" name="genre" value="<?= $film->genre ?>" /><br>
    Réalisateur: <input type="text" name="realisateur" value="<?= $film->realisateur ?>" /><br>
    <input type="submit" value="Modifier" />
</form>

        <?php
    } else {
        echo "Film non trouvé.";
    }
    ?>
    
</body>
</html>
