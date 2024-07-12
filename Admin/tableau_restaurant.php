<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Restaurants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand bg-dark text-white p-2" href=".\tableau_film.php"> <img src=".\..\assets\left-arrow-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon" width="25px"> Gestion des Films
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link bg-warning font-weight-bold text-white fs-1" href="./../index.html">Visiteur</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>        


    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Gestion des <b>Restaurants</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addRestaurantModal" class="btn btn-success" data-toggle="modal">
                                <img src="../assets/plus-svgrepo-com.png" alt="" width="10">
                                <span>Ajouter Restaurant</span>
                            </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Restaurateur</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Chargement des restaurants depuis le fichier XML
                        $restaurants = simplexml_load_file('../xml/restaurants.xml');

                        // Parcours des restaurants et affichage dans le tableau
                        foreach ($restaurants->restaurant as $restaurant) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($restaurant->nom) . "</td>";
                            echo "<td>" . htmlspecialchars($restaurant->adresse) . "</td>";
                            echo "<td>" . htmlspecialchars($restaurant->restaurateur) . "</td>";
                            echo "<td>" . htmlspecialchars($restaurant->description) . "</td>";
                            echo '<td>
                                    <button class="btn btn-sm view-restaurant-btn" data-id="' . $restaurant->attributes()->id . '">
                                        <img src="../assets/eye-alt-svgrepo-com.png" alt="" width="20">
                                    </button>
                                     <button class="btn btn-sm edit-restaurant-btn" data-id="' . $restaurant->attributes()->id . '">
                                        <img src="../assets/edit-4-svgrepo-com.png" alt="" width="20">
                                    </button>
                                    <button class="btn btn-sm delete-restaurant-btn" data-id="' . $restaurant->attributes()->id . '">
                                        <img src="../assets/delete-svgrepo-com.png" alt="" width="20">
                                    </button>
                                </td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Précédent</a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#">Suivant</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale d'ajout de restaurant -->
    <div id="addRestaurantModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="restaurantForm" method="POST" action="../CRUD restaurant/add_restaurant.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter un Restaurant</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nom">Nom:</label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse:</label>
                            <input type="text" id="adresse" name="adresse" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="restaurateur">Restaurateur:</label>
                            <input type="text" id="restaurateur" name="restaurateur" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modale de modification de restaurant -->
    <div id="editRestaurantModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editRestaurantForm" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier le Restaurant</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_nom">Nom:</label>
                            <input type="text" id="edit_nom" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_adresse">Adresse:</label>
                            <input type="text" id="edit_adresse" name="adresse" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_restaurateur">Restaurateur:</label>
                            <input type="text" id="edit_restaurateur" name="restaurateur" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_description">Description:</label>
                            <textarea id="edit_description" name="description" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modale de confirmation de suppression de restaurant -->
    <div id="deleteRestaurantModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="deleteRestaurantForm" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Supprimer le Restaurant</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer ce restaurant?</p>
                        <div id="deleteRestaurantDetails">
                            <!-- Les détails du restaurant seront affichés ici -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Message -->
    <div id="message"></div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fonction pour pré-remplir le formulaire de modification de restaurant
            function editRestaurant(id) {
                fetch(`../CRUD restaurant/get_restaurant.php?id=${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur HTTP ' + response.status);
                    }
                    return response.json();
                })
                .then(restaurant => {
                    if (restaurant && restaurant.id) {
                        $('#edit_nom').val(restaurant.Nom);
                        $('#edit_adresse').val(restaurant.Adresse);
                        $('#edit_restaurateur').val(restaurant.Restaurateur);
                        $('#edit_description').val(restaurant.Description);

                        // Préparer l'action du formulaire pour la modification
                        $('#editRestaurantForm').attr('action', `../CRUD restaurant/edit_restaurant.php?id=${id}`);

                        // Afficher la modale de modification
                        $('#editRestaurantModal').modal('show');
                    } else {
                        console.error('Erreur: les données du restaurant sont manquantes.');
                        alert('Erreur: les données du restaurant sont manquantes.');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Erreur lors de la récupération des données du restaurant.');
                });
            }

            // Fonction pour récupérer les détails du restaurant avant de le supprimer
            function confirmDeleteRestaurant(id) {
            fetch(`../CRUD restaurant/get_restaurant.php?id=${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur HTTP ' + response.status);
                }
                return response.json();
            })
            .then(restaurant => {
                if (restaurant && restaurant.id) {
                    // Afficher les détails du restaurant dans la modale de suppression
                    $('#deleteRestaurantDetails').html(`
                        <p><strong>Nom:</strong> ${restaurant.Nom}</p>
                        <p><strong>Adresse:</strong> ${restaurant.Adresse}</p>
                        <p><strong>Restaurateur:</strong> ${restaurant.Restaurateur}</p>
                        <p><strong>Description:</strong> ${restaurant.Description}</p>
                    `);

                    // Confirmer la suppression
                    $('#confirmDeleteBtn').off('click').on('click', function() {
                        deleteRestaurant(id);
                    });

                    // Afficher la modale de confirmation de suppression
                    $('#deleteRestaurantModal').modal('show');
                } else {
                    console.error('Erreur: les données du restaurant sont manquantes.');
                    alert('Erreur: les données du restaurant sont manquantes.');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de la récupération des données du restaurant.');
            });
        }

         function deleteRestaurant(id) {
            // Envoyer la requête POST pour la suppression
            fetch('../CRUD restaurant/delete_restaurant.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: id }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur HTTP ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                // Afficher le message de succès ou d'erreur
                alert(data.message);
                // Recharger la page ou mettre à jour la liste des restaurants après suppression
                window.location.reload(); // Vous pouvez ajuster cette partie en fonction de votre besoin
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de la suppression du restaurant.');
            });
        }
            // Associer l'événement de clic aux boutons de modification
            $(document).on('click', '.edit-restaurant-btn', function() {
                const restaurantId = $(this).data('id');
                editRestaurant(restaurantId);
            });

            // Associer l'événement de clic aux boutons de suppression
            $(document).on('click', '.delete-restaurant-btn', function() {
                const restaurantId = $(this).data('id');
                confirmDeleteRestaurant(restaurantId);
            });
        });
    </script>
</body>
</html>
