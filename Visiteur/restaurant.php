<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .oswald {
            font-family: 'Oswald', cursive;
        }
        .welcome-text {
            font-size: 4rem;
            color: #343a40;
            font-family: 'Brush Script MT', cursive;
        }
        .card-custom {
            height: 65vh;
            width: 25vw;
        }
        .modal-custom {
            width: 70vw;
        }
        .modal {
            display: none;
        }
        .modal-active {
            display: flex;
        }
        .table-container {
            max-height: 50vh; /* Vous pouvez ajuster la hauteur maximale selon vos besoins */
            overflow-y: auto;
            width: 100%;
        }

    </style>
</head>
<body class="h-screen m-0 bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="./../index.html" class="flex items-center justify-center inline-block text-2xl bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700"><img src=".\..\assets\left-arrow-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon"> Go back</a>
            <a href="#" class="inline-block text-2xl bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Administrateur</a>
        </div>
    </nav>

    <!-- Welcome Message -->
    <div class="flex flex-col justify-center items-center">
        <div class="welcome-text mb-8">
            Restaurants !
        </div>
        <div class="grid grid-cols-3 space-x-4">
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/736x/e5/48/7a/e5487a70a493246eb388dc5485d8dade.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2">Le Gourmet</div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jean Dupont</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\position-marker-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Location Icon">
                            <p>123 Rue de Paris, 75000 Paris, France</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\note-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon">
                            <p>Un restaurant gastronomique situé au cœur de Paris. Nous proposons une cuisine raffinée et élégante avec des produits frais et de saison.</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Voir la carte</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/ff/3e/70/ff3e70f485d5c59886256d78d10c2949.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2">La Belle Époque</div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Marie Dubois</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\position-marker-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Location Icon">
                            <p>45 Avenue des Champs-Élysées, 75008 Paris, France</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\note-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon">
                            <p>Un restaurant traditionnel offrant une cuisine française classique dans un cadre élégant et historique.</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Voir la carte</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/56/00/f4/5600f4d05244401a0782893785341dbd.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2">Chez Pierre</div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Pierre Martin</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\position-marker-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Location Icon">
                            <p>78 Rue de Rivoli, 75001 Paris, France</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\note-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon">
                            <p>Un bistrot convivial proposant une cuisine française authentique avec une touche moderne.</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Voir la carte</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/736x/e5/48/7a/e5487a70a493246eb388dc5485d8dade.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2">Le Gourmet</div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jean Dupont</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\position-marker-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Location Icon">
                            <p>123 Rue de Paris, 75000 Paris, France</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\note-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon">
                            <p>Un restaurant gastronomique situé au cœur de Paris. Nous proposons une cuisine raffinée et élégante avec des produits frais et de saison.</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Voir la carte</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/736x/e5/48/7a/e5487a70a493246eb388dc5485d8dade.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2">Le Gourmet</div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jean Dupont</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\position-marker-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Location Icon">
                            <p>123 Rue de Paris, 75000 Paris, France</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\note-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon">
                            <p>Un restaurant gastronomique situé au cœur de Paris. Nous proposons une cuisine raffinée et élégante avec des produits frais et de saison.</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Voir la carte</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/736x/e5/48/7a/e5487a70a493246eb388dc5485d8dade.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2">Le Gourmet</div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jean Dupont</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\position-marker-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Location Icon">
                            <p>123 Rue de Paris, 75000 Paris, France</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\note-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon">
                            <p>Un restaurant gastronomique situé au cœur de Paris. Nous proposons une cuisine raffinée et élégante avec des produits frais et de saison.</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Voir la carte</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/736x/e5/48/7a/e5487a70a493246eb388dc5485d8dade.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2">Le Gourmet</div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jean Dupont</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\position-marker-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Location Icon">
                            <p>123 Rue de Paris, 75000 Paris, France</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\note-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon">
                            <p>Un restaurant gastronomique situé au cœur de Paris. Nous proposons une cuisine raffinée et élégante avec des produits frais et de saison.</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Voir la carte</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/736x/e5/48/7a/e5487a70a493246eb388dc5485d8dade.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                    <div class="font-bold text-xl mb-2">Le Gourmet</div>
                    <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jean Dupont</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\position-marker-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Location Icon">
                            <p>123 Rue de Paris, 75000 Paris, France</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\note-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon">
                            <p>Un restaurant gastronomique situé au cœur de Paris. Nous proposons une cuisine raffinée et élégante avec des produits frais et de saison.</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Voir la carte</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="restaurant-modal" class="modal fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="modal-custom flex flex-col items-center justify-center bg-white p-4 rounded shadow-lg w-10/12 h-3/4 overflow-y-auto">
            <h2 class="text-2xl font-bold mb-4 oswald">Le Gourmet</h2>
            <p class="mb-4">Un restaurant gastronomique situé au cœur de Paris. Nous proposons une cuisine raffinée et élégante avec des produits frais et de saison.</p>
            <div class="table-container">
                <div class="flex flex-col justify-start">
                    <h1 class="font-bold text-xl italic">Carte</h1>
                    <table class="table-auto w-full text-left mb-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nom</th>
                                <th class="px-4 py-2">Partie</th>
                                <th class="px-4 py-2">Prix</th>
                                <th class="px-4 py-2">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">Soupe à l'oignon</td>
                                <td class="border px-4 py-2">Entrée</td>
                                <td class="border px-4 py-2">15.00 EUR</td>
                                <td class="border px-4 py-2 italic">Soupe à l'oignon gratinée.</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">Coq au Vin</td>
                                <td class="border px-4 py-2">Plat</td>
                                <td class="border px-4 py-2">30.00 EUR</td>
                                <td class="border px-4 py-2 italic">Coq braisé au vin rouge avec des légumes de saison.</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">Tarte Tatin</td>
                                <td class="border px-4 py-2">Dessert</td>
                                <td class="border px-4 py-2">12.00 EUR</td>
                                <td class="border px-4 py-2 italic">Tarte aux pommes caramélisées.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col justify-start">
                    <h1 class="font-bold text-xl italic">Menus</h1>
                    <table class="table-auto w-full text-left mb-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Titre</th>
                                <th class="px-4 py-2">Entrée</th>
                                <th class="px-4 py-2">Plat</th>
                                <th class="px-4 py-2">Dessert</th>
                                <th class="px-4 py-2">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">Menu Tradition</td>
                                <td class="border px-4 py-2">Soupe à l'oignon</td>
                                <td class="border px-4 py-2">Coq au Vin</td>
                                <td class="border px-4 py-2">Tarte Tatin</td>
                                <td class="border px-4 py-2">50.00 EUR</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
