
<?php
include '../config/xml_film_config.php';

// Gestion de la modification d'un film
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifiez si l'ID est numérique et valide
    if (!is_numeric($id)) {
        die('Erreur : ID de film non valide.');
    }

    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $duree = $_POST['duree'];
    $genre = $_POST['genre'];
    $realisateur = $_POST['realisateur'];
    $annee = $_POST['annee'];
    $synopsis = $_POST['synopsis'];

    // Validation des données (assurez-vous qu'aucun champ n'est vide par exemple)
    if (empty($titre) || empty($duree) || empty($genre) || empty($realisateur) || empty($annee) || empty($synopsis)) {
        die('Erreur : Les données du film sont incomplètes.');
    }

    // Traitement de la modification du film dans le fichier XML (exemple)
    $films = simplexml_load_file('../xml/films.xml');

    // Recherche du film par son ID pour la modification
    $filmFound = false;
    foreach ($films->Film as $film) {
        if ($film->id == $id) {
            $film->Titre = $titre;
            $film->Duree = $duree;
            $film->Genre = $genre;
            $film->Realisateur = $realisateur;
            $film->Annee = $annee;
            $film->Synopsis = $synopsis;
            $filmFound = true;
            break;
        }
    }

    if (!$filmFound) {
        die('Erreur : Film non trouvé pour la modification.');
    }

    // Sauvegarde des modifications dans le fichier XML
    $films->asXML('../xml/films.xml');

    // Réponse de succès
    echo json_encode(array('message' => 'Film modifié avec succès.'));
    exit();
}
?>


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
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
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
                        <label for="presse">Presse:</label>
                        <input type="text" id="presse" name="presse" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="spectateurs">Spectateurs:</label>
                        <input type="text" id="spectateurs" name="spectateurs" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="horaires">Horaires:</label>
                        <input type="text" id="horaires" name="horaires" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" id="addFilmBtn" class="btn btn-success" value="Ajouter">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modale d'édition de film -->
<div id="editFilmModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editFilmForm" method="POST" action="../CRUD film/edit_film.php">
                <div class="modal-header">
                    <h4 class="modal-title">Éditer le Film</h4>
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
                        <label for="edit_annee">Année:</label>
                        <input type="text" id="edit_annee" name="annee" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_synopsis">Synopsis:</label>
                        <textarea id="edit_synopsis" name="synopsis" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" id="editFilmBtn" class="btn btn-info" value="Enregistrer">
                    <input type="hidden" id="edit_film_id" name="id">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modale de suppression de film -->
<div id="deleteFilmModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteFilmForm" method="POST" action="../CRUD film/delete_film.php">
                <div class="modal-header">
                    <h4 class="modal-title">Supprimer le Film</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce film?</p>
                    <p class="text-warning"><small>Cette action est irréversible.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" id="deleteFilmBtn" class="btn btn-danger" value="Supprimer">
                    <input type="hidden" id="delete_film_id" name="id">
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
    const idElement = film.getElementsByTagName('id')[0];
    const titreElement = film.getElementsByTagName('Titre')[0];
    const dureeElement = film.getElementsByTagName('Duree')[0];
    const genreElement = film.getElementsByTagName('Genre')[0];
    const realisateurElement = film.getElementsByTagName('Realisateur')[0];
    const anneeElement = film.getElementsByTagName('Annee')[0];
    const synopsisElement = film.getElementsByTagName('Synopsis')[0];

    // Vérifier si les éléments existent avant d'accéder à leur contenu
    const id = idElement ? idElement.textContent : '';
    const titre = titreElement ? titreElement.textContent : '';
    const duree = dureeElement ? dureeElement.textContent : '';
    const genre = genreElement ? genreElement.textContent : '';
    const realisateur = realisateurElement ? realisateurElement.textContent : '';
    const annee = anneeElement ? anneeElement.textContent : '';
    const synopsis = synopsisElement ? synopsisElement.textContent : '';

    filmsData.push({
        id: id,
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
                        <button class="btn btn-sm" data-id="${film.id}"><img src="../assets/eye-alt-svgrepo-com.png" alt="" width="20"></button>
                        <button class="btn btn-sm edit-film-btn" data-id="${film.id}"><img src="../assets/edit-4-svgrepo-com.png" alt="" width="20"></button>
                        <button class="btn btn-sm" onclick="deleteFilm(${film.id})"><img src="../assets/delete-svgrepo-com.png" alt="" width="20"></button>
                    </td>`;
                filmsTable.appendChild(row);

                // Ajoutez un écouteur d'événement pour le bouton Modifier
                const editBtn = row.querySelector('.edit-film-btn');
                editBtn.addEventListener('click', () => editFilm(film.id));
            });
        })
        .catch(error => console.error('Erreur lors du chargement des films depuis le XML:', error));
}

// Fonction pour éditer un film
function editFilm(id) {
    // Redirection vers la page d'édition avec l'ID du film
    window.location.href = `edit_film.php?id=${id}`;
}

// Charger les films au chargement de la page
loadFilmsFromXML();


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
                function editFilm(id) {
        fetch(`get_film.php?id=${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur HTTP ' + response.status);
            }
            return response.json();
        })
        .then(film => {
            if (film && film.id) {
                document.getElementById('titre').value = film.Titre;
                document.getElementById('duree').value = film.Duree;
                document.getElementById('genre').value = film.Genre;
                document.getElementById('realisateur').value = film.Realisateur;
                document.getElementById('annee').value = film.Annee;
                document.getElementById('synopsis').value = film.Synopsis;

                const form = document.getElementById('filmForm');
                form.setAttribute('action', `edit_film.php?id=${id}`);
                form.querySelector('button[type="submit"]').innerText = 'Modifier';
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




                // Associer l'événement de clic aux boutons de modification
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('edit-film-btn')) {
                        const filmId = event.target.getAttribute('data-id');
                        editFilm(filmId);
                    }
                });

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
