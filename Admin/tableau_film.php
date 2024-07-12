    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des Films</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand bg-dark text-white p-2" href=".\tableau_restaurant.php"> <img src=".\..\assets\left-arrow-svgrepo-com.png" class="w-6 h-6 mr-2" alt="Note Icon" width="25px"> Gestion des Restaurants</a>
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
                                <h2>Gestion des <b>Films</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#addFilmModal" class="btn btn-success" data-toggle="modal"><img src="../assets/plus-svgrepo-com.png" alt="" width="10"><span>Ajouter Film</span></a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Durée</th>
                                <th>Genre</th>
                                <th>Réalisateur</th>
                                <th>Année</th>
                                <th>Synopsis</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les lignes de films seront ajoutées ici via JavaScript -->
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

       <!-- Modale d'ajout de film -->
<div id="addFilmModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="filmForm" method="POST" action="../CRUD film/add_film.php">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un Film</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="titre">Titre:</label>
                        <input type="text" id="titre" name="titre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="duree">Durée:</label>
                        <input type="text" id="duree" name="duree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre:</label>
                        <input type="text" id="genre" name="genre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="realisateur">Réalisateur:</label>
                        <input type="text" id="realisateur" name="realisateur" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="langue_diffusion">Langue de Diffusion:</label>
                        <input type="text" id="langue_diffusion" name="langue_diffusion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="annee">Année:</label>
                        <input type="text" id="annee" name="annee" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="synopsis">Synopsis:</label>
                        <textarea id="synopsis" name="synopsis" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="acteurs">Acteurs (séparés par des virgules):</label>
                        <input type="text" id="acteurs" name="acteurs" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="presse">Notes Presse:</label>
                        <input type="text" id="presse" name="presse" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="spectateurs">Notes Spectateurs:</label>
                        <input type="text" id="spectateurs" name="spectateurs" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="horaires">Horaires (jour et heures séparées par des virgules, ex: Lun:10:00,14:00,16:00):</label>
                        <input type="text" id="horaires" name="horaires" class="form-control" required>
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

<!-- Modale de modification de film -->
<div id="editFilmModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editFilmForm" method="POST" action="../CRUD film/add_film.php">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier un Film</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_titre">Titre:</label>
                        <input type="text" id="edit_titre" name="titre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_duree">Durée:</label>
                        <input type="text" id="edit_duree" name="duree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_genre">Genre:</label>
                        <input type="text" id="edit_genre" name="genre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_realisateur">Réalisateur:</label>
                        <input type="text" id="edit_realisateur" name="realisateur" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_langue_diffusion">Langue de Diffusion:</label>
                        <input type="text" id="edit_langue_diffusion" name="langue_diffusion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_annee">Année:</label>
                        <input type="text" id="edit_annee" name="annee" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_synopsis">Synopsis:</label>
                        <textarea id="edit_synopsis" name="synopsis" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_acteurs">Acteurs (séparés par des virgules):</label>
                        <input type="text" id="edit_acteurs" name="acteurs" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_presse">Notes Presse:</label>
                        <input type="text" id="edit_presse" name="presse" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_spectateurs">Notes Spectateurs:</label>
                        <input type="text" id="edit_spectateurs" name="spectateurs" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_horaires">Horaires (jour et heures séparées par des virgules, ex: Lun:10:00,14:00,16:00):</label>
                        <input type="text" id="edit_horaires" name="horaires" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <!-- Les détails du film seront affichés ici -->
<div id="viewFilmModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Détails du film</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div id="viewFilmDetails">
                    <!-- Les détails du film seront affichés ici -->
                           
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>



        <!-- Message -->
        <div id="message"></div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Fonction pour charger les films depuis le fichier XML
                function loadFilmsFromXML() {
                    fetch('../xml/films.xml') // Chemin vers votre fichier XML
                        .then(response => response.text())
                        .then(xmlString => {
                            const parser = new DOMParser();
                            const xmlDoc = parser.parseFromString(xmlString, 'text/xml');
                            const films = xmlDoc.getElementsByTagName('Film');

                            const filmsData = [];
                            for (let film of films) {
                                const titre = film.getElementsByTagName('Titre')[0].textContent;
                                const duree = film.getElementsByTagName('Duree')[0].textContent;
                                const genre = film.getElementsByTagName('Genre')[0].textContent;
                                const realisateur = film.getElementsByTagName('Realisateur')[0].textContent;
                                const annee = film.getElementsByTagName('Annee')[0].textContent;
                                const synopsis = film.getElementsByTagName('Synopsis')[0].textContent;
                                

                                filmsData.push({
                                    Titre: titre,
                                    Duree: duree,
                                    Genre: genre,
                                    Realisateur: realisateur,
                                    Annee: annee,
                                    Synopsis: synopsis
                                });
                            }

                            return filmsData;
                        })
                        .then(filmsData => {
                            const filmsTable = document.querySelector('tbody');
                            filmsTable.innerHTML = '';
                            filmsData.forEach(film => {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                    <td>${film.Titre}</td>
                                    <td>${film.Duree}</td>
                                    <td>${film.Genre}</td>
                                    <td>${film.Realisateur}</td>
                                    <td>${film.Annee}</td>
                                    <td>${film.Synopsis}</td>
                                    <td>
                                        <button class="btn btn-sm view-film-btn" data-id="669193c48026b"><img src="../assets/eye-alt-svgrepo-com.png" alt="" width="20"></button>
                                      <button class="btn btn-sm edit-film-btn" data-id="669193c48026b">
                                     <img src="../assets/edit-4-svgrepo-com.png" alt="" width="20">
                                    </button>
                                        <button class="btn btn-sm" onclick="deleteFilm(${film.id})"><img src="../assets/delete-svgrepo-com.png" alt="" width="20"></button>

                                    </td>`;
                                filmsTable.appendChild(row);
                            });
                        })
                        .catch(error => console.error('Erreur lors du chargement des films depuis le XML:', error));
                }

                loadFilmsFromXML();

                //pour modifier
                function viewFilm(id) {
                    fetch(`../CRUD film/get_film.php?id=${id}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Erreur HTTP ' + response.status);
                            }
                            return response.json();
                        })
                        .then(film => {
                            if (film && film.id) {
                                // Afficher les détails du film dans la modale de visualisation
                                $('#viewFilmDetails').html(`
                                    <p><strong>Titre:</strong> ${film.Titre}</p>
                                    <p><strong>Durée:</strong> ${film.Duree}</p>
                                    <p><strong>Genre:</strong> ${film.Genre}</p>
                                    <p><strong>Réalisateur:</strong> ${film.Realisateur}</p>
                                    <p><strong>Langue de diffusion:</strong> ${film.LangueDiffusion}</p>
                                    <p><strong>Année:</strong> ${film.Annee}</p>
                                    <p><strong>Synopsis:</strong> ${film.Synopsis}</p>
                                    <p><strong>Acteurs:</strong> Vin Diesel, Paul Walker</p>
                                    <p><strong>Presse:</strong> Arona </p>
                                    <p><strong>Spectateurs:</strong> Marie,Djiby,Arona,Mortalla,Saliou,Fedior</p>
                                    <p><strong>Horaires:</strong> Lun:10:00,14:00,16:00</p>
                                `);

                                // Afficher la modale de visualisation du film
                                $('#viewFilmModal').modal('show');
                            } else {
                                console.error('Erreur: les données du film sont manquantes.');
                                alert('Erreur: les données du film sont manquantes.');
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                            alert('Erreur lors de la récupération des données du film.');
                        });
                }

              // Fonction pour éditer un film par son ID
                function editFilm(id) {
                    fetch(`../CRUD film/get_film.php?id=${id}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erreur HTTP ' + response.status);
                        }
                        return response.json();
                    })
                    .then(film => {
                        if (film && film.id) {
                            // Remplir les champs du formulaire avec les données du film
                            document.getElementById('edit_titre').value = film.Titre;
                            document.getElementById('edit_duree').value = film.Duree;
                            document.getElementById('edit_genre').value = film.Genre;
                            document.getElementById('edit_realisateur').value = film.Realisateur;
                            document.getElementById('edit_langue_diffusion').value = film.LangueDiffusion;
                            document.getElementById('edit_annee').value = film.Annee;
                            document.getElementById('edit_synopsis').value = film.Synopsis;
                            document.getElementById('edit_acteurs').value = film.acteurs;
                            document.getElementById('edit_presse').value = film.presse;
                            document.getElementById('edit_spectateurs').value = film.spectateurs;
                            document.getElementById('edit_horaires').value = film.horaires;

                            // Mettre à jour l'action du formulaire avec l'ID du film pour l'édition
                            const form = document.getElementById('editFilmForm');
                            form.setAttribute('action', `../CRUD film/edit_film.php?id=${id}`);
                            form.querySelector('button[type="submit"]').innerText = 'Modifier';

                            // Afficher la modale de modification
                            $('#editFilmModal').modal('show');
                        } else {
                            console.error('Erreur: les données du film sont manquantes.');
                            alert('Erreur: les données du film sont manquantes.');
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        alert('Erreur lors de la récupération des données du film.');
                    });
                }

                // Écouter le clic sur le bouton d'édition d'un film
                $(document).on('click', '.edit-film-btn', function() {
    const idfilm = $(this).data('id');
    console.log(idfilm); // Vérifiez si idfilm est correctement défini
    editFilm(idfilm);
});

$(document).on('click', '.view-film-btn', function() {
    const idfilm = $(this).data('id');
    console.log(idfilm); // Vérifiez si idfilm est correctement défini
    viewFilm(idfilm);
});




                // Fonction pour supprimer un film
                function deleteFilm(id) {
                    if (confirm('Êtes-vous sûr de vouloir supprimer ce film?')) {
                        fetch('delete_film.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id=${id}`
                        })
                        .then(response => {
                            if (response.ok) {
                                document.getElementById('message').innerText = 'Film supprimé avec succès.';
                                loadFilmsFromXML();
                            } else {
                                throw new Error('Erreur lors de la suppression du film.');
                            }
                        })
                        .catch(error => console.error('Erreur:', error));
                    }
                }

                // Fonction pour pré-remplir le formulaire de modification de film
              

               // Associer l'événement de clic aux boutons de modification
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('edit-film-btn')) {
                        const filmId = event.target.getAttribute('data-id');
                        editFilm(filmId);
                    }
                });
                // $(document).on('click', '.edit-film-btn', function() {
                // const idfilm = $(this).data('id');
                // editFilm(idfilm);
                // });

                // Réinitialiser le formulaire d'ajout de film lorsque la modale est fermée
                $('#addFilmModal').on('hidden.bs.modal', function() {
                    document.getElementById('filmForm').reset();
                    const form = document.getElementById('filmForm');
                    form.setAttribute('action', '../CRUD film/add_film.php');
                    form.querySelector('button[type="submit"]').innerText = 'Ajouter';
                });
            });
        </script>
    </body>
    </html>
