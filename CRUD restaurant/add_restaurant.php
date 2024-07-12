<?php
// Include the XML configuration and functions
include '../config/xml_restaurant_config.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data, ensuring to sanitize input
    $nom = htmlspecialchars($_POST['nom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $restaurateur = htmlspecialchars($_POST['restaurateur']);
    $description = htmlspecialchars($_POST['description']);

    // Load existing XML data or create new structure if it doesn't exist
    $xml = loadXMLData();

    // Create a new restaurant element
    $restaurant = $xml->addChild('restaurant');
    $id = uniqid(); // Generate a unique ID
    $restaurant->addAttribute('id', $id); // Add ID attribute to the restaurant

    $restaurant->addChild('nom', $nom);
    $restaurant->addChild('adresse', $adresse);
    $restaurant->addChild('restaurateur', $restaurateur);
    $restaurant->addChild('description', $description);

    // Save the modifications back to the XML file
    saveXMLData($xml);

    // Redirect to the home page with a message in the URL
    header("Location: http://localhost/updateXML/projetXml/Admin/tableau_restaurant.php");
    exit();
}
?>
