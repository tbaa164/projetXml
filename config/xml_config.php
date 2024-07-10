<?php
// Fonction pour charger les données XML depuis le fichier
function loadXMLData() {
    $xmlFile = 'films.xml';
    if (file_exists($xmlFile)) {
        return simplexml_load_file($xmlFile);
    } else {
        return new SimpleXMLElement('<films></films>');
    }
}

// Fonction pour sauvegarder les données XML dans le fichier
function saveXMLData($xml) {
    $xmlFile = 'films.xml';
    $xml->asXML($xmlFile);
}

// Fonction pour trouver l'index d'un film par ID
function findFilmIndexById($xml, $id) {
    foreach ($xml->film as $index => $film) {
        if ((int)$film['id'] == (int)$id) {
            return $index;
        }
    }
    return false;
}
?>
