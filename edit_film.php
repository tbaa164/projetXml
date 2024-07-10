<?php
include 'config/xml_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $xml = loadXMLData();

    $filmIndex = findFilmIndexById($xml, $id);
    if ($filmIndex !== false) {
        $film = $xml->film[$filmIndex];
        echo json_encode($film);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Aucun film trouvé avec l'ID spécifié."));
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $titre = $_POST['titre'];
        $duree = $_POST['duree'];
        $genre = $_POST['genre'];
        $realisateur = $_POST['realisateur'];
        $annee = $_POST['annee'];
        $synopsis = $_POST['synopsis'];

        $xml = loadXMLData();

        $filmIndex = findFilmIndexById($xml, $id);
        if ($filmIndex !== false) {
            $film = $xml->film[$filmIndex];
            $film->titre = $titre;
            $film->duree = $duree;
            $film->genre = $genre;
            $film->realisateur = $realisateur;
            $film->annee = $annee;
            $film->synopsis = $synopsis;

            saveXMLData($xml);

            // Redirection avec un message dans l'URL
            header("Location: eeee.php?message=Film%20mis%20à%20jour%20avec%20succès&id={$id}");
            exit();
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Aucun film trouvé avec l'ID spécifié."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "ID du film non spécifié dans la requête POST."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Méthode HTTP non supportée."));
}
?>
