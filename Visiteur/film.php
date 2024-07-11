<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
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
            max-height: 300px; /* Vous pouvez ajuster la hauteur maximale selon vos besoins */
            overflow-y: auto;
            width: 100%;
        }

        .tab-content > div {
            display: none;
        }
        .tab-content > .active {
            display: block;
        }

    </style>
</head>
<body class="h-screen m-0 bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="./../index.html" class="flex items-center justify-center inline-block text-2xl bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700"><img src=".\..\assets\left-arrow-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon"> Go back</a>
            <a href="#" class="inline-block text-2xl bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Administrateur</a>
        </div>
    </nav>

    <!-- Welcome Message -->
    <div class="flex flex-col justify-center items-center">
        <div class="welcome-text mb-8">
            Cinéma !
        </div>
        <div class="grid grid-cols-3 space-x-4">
        <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
            <div class="card-custom overflow-hidden shadow-lg bg-white mb-8">
                <img src="https://i.pinimg.com/564x/68/ea/02/68ea02c1baf2a8477216cf401bb378ae.jpg" class="w-full h-1/2 object-cover" alt="Cinema Image">
                <div class="px-6 py-4 text-center">
                <div class="font-bold text-xl mb-2">Les Brigades du Tigre</div>
                <div class="font-bold text-sm mb-2 italic">Policier</div>
                <div class="mb-4">
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>2h 5min</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>Jérôme Cornuau</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>VF (en Français)</p>
                        </div>
                        <div class="flex items-start justify-start mb-2">
                            <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                            <p>C. Cornillac, D. Kruger, E. Baer</p>
                        </div>
                    </div>
                    <button onclick="openModal()" class="inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Voir plus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="restaurant-modal" class="modal fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="modal-custom flex flex-col items-center justify-center bg-white p-4 rounded shadow-lg w-3/5 h-3/4 overflow-y-auto">
        <h2 class="text-2xl font-bold mb-1 oswald">Les Brigades du Tigre</h2>
        <h2 class="text-lg mb-4 italic">Policier</h2>
        <p class="mb-4 mx-4">Les aventures du commissaire Valentin et des inspecteurs Terrasson et Pujol, membres des Brigades mobiles, corps spécial de la police française créé avant la Première Guerre mondiale.</p>
            <div class="grid grid-cols-2 mb-4">
                <div class="flex items-start justify-start mb-2">
                    <img src=".\..\assets\alarm-clock-alt-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                    <p>2h 5min</p>
                </div>
                <div class="flex items-start justify-start mb-2">
                    <img src=".\..\assets\actor-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                    <p>Jérôme Cornuau</p>
                </div>
                <div class="flex items-start justify-start mb-2">
                    <img src=".\..\assets\language-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                    <p>VF (en Français)</p>
                </div>
                <div class="flex items-start justify-start mb-2">
                    <img src=".\..\assets\person-team-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Person Icon">
                    <p>C. Cornillac, D. Kruger, E. Baer</p>
                </div>
            </div>
            <div class="grid grid-cols-2 my-4">
                <div class="col-span-2 flex justify-center items-center">
                    <img class="w-6 h-6 mr-2" src=".\..\assets\star-svgrepo-com.png" alt="">
                    <p>Notes : </p>
                </div>
                <div> <span class="font-bold">Presse : </span>3/5</div>
                <div> <span class="font-bold">Spectateurs : </span>4/5</div>
            </div>

            <div class="m-4">
                <div class="card text-center border rounded-lg shadow-lg">
                    <div class="card-header">
                        <ul class="flex border-b" id="myTab">
                        <li class="nav-item flex-1">
                                <a href="#lun" class="block py-2 px-4 text-blue-500 hover:text-blue-700 border-b-2 border-blue-500" data-tab="lun">Lun</a>
                            </li>
                            <li class="nav-item flex-1">
                                <a href="#mar" class="block py-2 px-4 text-blue-500 hover:text-blue-700 border-b-2 border-blue-500" data-tab="mar">Mar</a>
                            </li>
                            <li class="nav-item flex-1">
                                <a href="#mer" class="block py-2 px-4 text-blue-500 hover:text-blue-700 border-b-2 border-blue-500" data-tab="mer">Mer</a>
                            </li>
                            <li class="nav-item flex-1">
                                <a href="#jeu" class="block py-2 px-4 text-blue-500 hover:text-blue-700 border-b-2 border-blue-500" data-tab="jeu">Jeu</a>
                            </li>
                            <li class="nav-item flex-1">
                                <a href="#ven" class="block py-2 px-4 text-blue-500 hover:text-blue-700 border-b-2 border-blue-500" data-tab="ven">Ven</a>
                            </li>
                            <li class="nav-item flex-1">
                                <a href="#sam" class="block py-2 px-4 text-blue-500 hover:text-blue-700 border-b-2 border-blue-500" data-tab="sam">Sam</a>
                            </li>
                            <li class="nav-item flex-1">
                                <a href="#dim" class="block py-2 px-4 text-blue-500 hover:text-blue-700 border-b-2 border-blue-500" data-tab="dim">Dim</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div id="lun" class="active">
                                <div class="flex justify-around">
                                    <p>14:00</p>
                                    <p>19:40</p>
                                    <p>22:10</p>
                                </div>
                            </div>
                            <div id="mar">
                                <div class="flex justify-around">
                                    <p>14:00</p>
                                    <p>19:40</p>
                                    <p>22:10</p>
                                </div>
                            </div>
                            <div id="mer">
                                <div class="flex justify-around">
                                    <p>14:00</p>
                                        <p>16:40</p>
                                        <p>19:40</p>
                                        <p>22:10</p>

                                </div>

                            </div>
                            <div id="jeu">
                                <div class="flex justify-around">
                                    <p>14:00</p>
                                        <p>19:40</p>
                                        <p>22:10</p>

                                </div>

                            </div>
                            <div id="ven">
                                <div class="flex justify-around">
                                    <p>14:00</p>
                                        <p>19:40</p>
                                        <p>22:10</p>


                                </div>        
                            </div>
                            <div id="sam">
                                <div class="flex justify-around">
                                    <p>14:00</p>
                                        <p>16:40</p>
                                        <p>19:40</p>
                                        <p>22:10</p>

                                </div>

                            </div>
                            <div id="dim">
                                <div class="flex justify-around">
                                    <p>10:20</p>
                                        <p>14:00</p>
                                        <p>16:40</p>
                                        <p>20:20</p>

                                    
                                </div>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
