<?php
// Chargement du fichier XML
$xml = simplexml_load_file('../xml/restaurants.xml') or die('Erreur de chargement du fichier XML');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="./resto.css" rel="stylesheet">
</head>
<body class="h-screen m-0 bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="./../index.html" class="flex items-center justify-center inline-block text-2xl bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">
                <img src=".\..\assets\left-arrow-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon"> Go back
            </a>
            <a href="#" class="inline-block text-2xl bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Administrateur</a>
        </div>
    </nav>

    <!-- Welcome Message -->
    <div class="flex flex-col justify-center items-center">
        <div class="welcome-text mb-8">
            Restaurants !
        </div>
        <div class="grid grid-cols-3 space-x-4">
            <?php foreach ($xml->restaurant as $restaurant) : ?>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="<?php echo $restaurant->images->image; ?>" class="w-full h-1/2 object-cover" alt="Restaurant Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2"><?php echo $restaurant->nom; ?></div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p><?php echo $restaurant->restaurateur; ?></p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\position-marker-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Location Icon">
                            <p><?php echo $restaurant->adresse; ?></p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\note-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon">
                            <p><?php echo $restaurant->description; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <button onclick="closeModal()" class="bg-red-500 text-white mt-2 py-2 px-4 rounded hover:bg-red-700">Fermer</button>
        </div>
    </div>
    <!-- JavaScript -->
    <script>
        function openModal() {
            document.getElementById('restaurant-modal').classList.add('modal-active');
        }

        function closeModal() {
            document.getElementById('restaurant-modal').classList.remove('modal-active');
        }
    </script>
</body>
</html>
