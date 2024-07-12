<?php
// Inclure la configuration XML et les fonctions nécessaires
include '../config/xml_film_config.php';

// Vérifier si l'ID du film est fourni dans la requête GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Paramètre ID manquant ou non valide.']);
    exit();
}

$id = $_GET['id'];

// Vérifier si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(['message' => 'Méthode non autorisée.']);
    exit();
}

// Charger le fichier XML des films
$films = simplexml_load_file('../xml/films.xml');

// Vérifier si le chargement du fichier XML a échoué
if ($films === false) {
    http_response_code(500);
    echo json_encode(['message' => 'Erreur lors du chargement du fichier XML des films.']);
    exit();
}

// Rechercher le film par son ID
$filmFound = null;
foreach ($films->Film as $film) {
    if ((string)$film->attributes()->id === $id) {
        $filmFound = $film;
        break;
    }
}

// Vérifier si le film a été trouvé
if (!$filmFound) {
    http_response_code(404);
    echo json_encode(['message' => 'Film non trouvé.']);
    exit();
}

// Récupération des données du formulaire sans htmlspecialchars pour le moment
$edit_titre = isset($_POST['edit_titre']) ? $_POST['edit_titre'] : '';
$edit_duree = isset($_POST['edit_duree']) ? $_POST['edit_duree'] : '';
$edit_genre = isset($_POST['edit_genre']) ? $_POST['edit_genre'] : '';
$edit_realisateur = isset($_POST['edit_realisateur']) ? $_POST['edit_realisateur'] : '';
$edit_langue_diffusion = isset($_POST['edit_langue_diffusion']) ? $_POST['edit_langue_diffusion'] : '';
$edit_annee = isset($_POST['edit_annee']) ? $_POST['edit_annee'] : '';
$edit_synopsis = isset($_POST['edit_synopsis']) ? $_POST['edit_synopsis'] : '';
$edit_acteurs = isset($_POST['edit_acteurs']) ? $_POST['edit_acteurs'] : '';
$edit_presse = isset($_POST['edit_presse']) ? $_POST['edit_presse'] : '';
$edit_spectateurs = isset($_POST['edit_spectateurs']) ? $_POST['edit_spectateurs'] : '';
$edit_horaires = isset($_POST['edit_horaires']) ? $_POST['edit_horaires'] : '';

// Mettre à jour les données du film avec celles envoyées depuis le formulaire
$filmFound->Titre = $edit_titre;
$filmFound->Duree = $edit_duree;
$filmFound->Genre = $edit_genre;
$filmFound->Realisateur = $edit_realisateur;
$filmFound->LangueDiffusion = $edit_langue_diffusion;
$filmFound->Annee = $edit_annee;
$filmFound->Synopsis = $edit_synopsis;
$filmFound->Acteurs = $edit_acteurs;
$filmFound->Presse = $edit_presse;
$filmFound->Spectateurs = $edit_spectateurs;
$filmFound->Horaires = $edit_horaires;

// Sauvegarder les modifications dans le fichier XML
if (!$films->asXML('../xml/films.xml')) {
    http_response_code(500);
    echo json_encode(['message' => 'Erreur lors de la sauvegarde des données du film dans le fichier XML.']);
    exit();
}

// Répondre avec un message de succès
echo json_encode(['message' => 'Film mis à jour avec succès.']);

// Redirection après la modification
header("Location: http://localhost/updateXML/projetXml/Admin/tableau_film.php");
exit();
?>
