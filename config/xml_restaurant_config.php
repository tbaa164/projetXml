<?php
// Fonction pour charger les données XML depuis le fichier
function loadXMLData() {
    $xmlFile = '../xml/restaurants.xml'; // Chemin relatif au script PHP actuel
    if (file_exists($xmlFile)) {
        return simplexml_load_file($xmlFile);
    } else {
        return new SimpleXMLElement('<restaurants></restaurants>');
    }
}

// Fonction pour sauvegarder les données XML dans le fichier
function saveXMLData($xml) {
    $xmlFile = '../xml/restaurants.xml'; // Chemin relatif au script PHP actuel
    $xml->asXML($xmlFile);
}

// Fonction pour trouver l'index d'un restaurant par ID
function findRestaurantIndexById($xml, $id) {
    foreach ($xml->restaurant as $index => $restaurant) {
        if ((string)$restaurant['id'] === (string)$id) {
            return $index;
        }
    }
    return false;
}
?>
