<?php
// Chargement du fichier XML
$xml = simplexml_load_file('../xml/films.xml') or die('Erreur de chargement du fichier XML');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="./film.css" rel="stylesheet">
</head>
<body class="h-screen m-0 bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="./../index.html" class="flex items-center justify-center inline-block text-2xl bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">
                <img src=".\..\assets\left-arrow-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon"> Go back
            </a>
            <a href="#" class="inline-block text-2xl bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Administrateur</a>
        </div>
    </nav>

    <!-- Welcome Message -->
    <div class="flex flex-col justify-center items-center">
        <div class="welcome-text mb-8">
            Cinéma !
        </div>
        <div class="grid grid-cols-3 space-x-4">
            <?php foreach ($xml->Film as $film) : ?>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="<?php echo $film->Images->ImagePrincipale; ?>" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2"><?php echo $film->Titre; ?></div>
                    <div class="font-bold text-sm mb-2 italic"><?php echo $film->Genre; ?></div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Clock Icon">
                            <p><?php echo $film->Duree; ?></p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Actor Icon">
                            <p><?php echo htmlspecialchars($film->Realisateur); ?></p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Language Icon">
                            <p><?php echo $film->LangueDiffusion; ?></p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Team Icon">
                            <p>
                                <?php
                                $acteurs = [];
                                foreach ($film->Acteurs->Acteur as $acteur) {
                                    $acteurs[] = (string)$acteur;
                                }
                                echo implode(', ', $acteurs);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <button onclick="closeModal()" class="bg-red-500 text-white py-2 px-4 mt-4 rounded hover:bg-red-700">Fermer</button>
        </div>
    </div>
    <!-- JavaScript -->
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll('[data-tab]');
            const tabContents = document.querySelectorAll('.tab-content > div');

            tabs.forEach(tab => {
                tab.addEventListener('click', function (event) {
                    event.preventDefault();
                    const target = tab.getAttribute('data-tab');

                    tabs.forEach(t => t.classList.remove('border-blue-500', 'text-blue-500'));
                    tab.classList.add('border-blue-500', 'text-blue-500');

                    tabContents.forEach(content => {
                        if (content.getAttribute('id') === target) {
                            content.classList.add('active');
                        } else {
                            content.classList.remove('active');
                        }
                    });
                });
            });
        });

        function openModal() {
            document.getElementById('restaurant-modal').classList.add('modal-active');
        }

        function closeModal() {
            document.getElementById('restaurant-modal').classList.remove('modal-active');
        }
    </script>
</body>
</html>
