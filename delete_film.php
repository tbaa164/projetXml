<?php
include 'config/xml_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'ID du film à supprimer
    $id = $_POST['id'];

    // Charger le fichier XML existant
    $xml = loadXMLData();

    // Rechercher le film par ID et le supprimer
    $filmIndex = findFilmIndexById($xml, $id);
    if ($filmIndex !== false) {
        unset($xml->film[$filmIndex]);
        saveXMLData($xml);

        // Redirection vers la page d'accueil avec un message dans l'URL
        header("Location: http://localhost/CrudFilmRestau/eeee.php#message=Film%20supprimé%20avec%20succès");
        exit();
    } else {
        // Si aucun film n'est trouvé
        http_response_code(404);
        echo json_encode(array("message" => "Aucun film trouvé avec l'ID spécifié."));
    }
}
?>
