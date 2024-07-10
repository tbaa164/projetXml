<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Films</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'config/xml_config.php'; ?>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Gestion des <b>Films</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addFilmModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter Film</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                <form id="filmForm" method="POST" action="add_film.php">
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
                            <label for="annee">Année:</label>
                            <input type="text" id="annee" name="annee" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="synopsis">Synopsis:</label>
                            <textarea id="synopsis" name="synopsis" class="form-control" rows="4" required></textarea>
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

    <!-- Message -->
    <div id="message"></div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    function loadFilms() {
        fetch('get_films.php')
            .then(response => response.json())
            .then(data => {
                const filmsTable = document.querySelector('tbody');
                filmsTable.innerHTML = '';
                data.forEach(film => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${film.id}</td>
                        <td>${film.Titre}</td>
                        <td>${film.Duree}</td>
                        <td>${film.Genre}</td>
                        <td>${film.Realisateur}</td>
                        <td>${film.Annee}</td>
                        <td>${film.Synopsis}</td>
                        <td>
                            <button class="btn btn-info btn-sm edit-film-btn" data-id="${film.id}">Modifier</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteFilm(${film.id})">Supprimer</button>
                        </td>`;
                    filmsTable.appendChild(row);
                });
            })
            .catch(error => console.error('Erreur lors du chargement des films:', error));
    }

    loadFilms();

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
                    loadFilms();
                } else {
                    throw new Error('Erreur lors de la suppression du film.');
                }
            })
            .catch(error => console.error('Erreur:', error));
        }
    }

    function editFilm(id) {
    fetch(`edit_film.php?id=${id}`)
    .then(response => response.json())
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
    .catch(error => console.error('Erreur:', error));
}


    $('#addFilmModal').on('hidden.bs.modal', function () {
        document.getElementById('filmForm').reset();
        document.getElementById('filmForm').setAttribute('action', 'add_film.php');
        document.querySelector('button[type="submit"]').innerText = 'Ajouter';
    });

    document.getElementById('filmForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const action = this.getAttribute('action');

        fetch(action, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                $('#addFilmModal').modal('hide');
                loadFilms();
                // Récupérer l'ID du film ajouté à partir de l'URL
                const urlParams = new URLSearchParams(window.location.search);
                const id = urlParams.get('id');
                document.getElementById('message').innerText = `Film ajouté avec succès. ID: ${id}`;
            } else {
                throw new Error('Erreur lors de l\'ajout/modification du film.');
            }
        })
        .catch(error => console.error('Erreur:', error));
    });

    document.querySelector('tbody').addEventListener('click', function(event) {
        if (event.target.classList.contains('edit-film-btn')) {
            const filmId = event.target.getAttribute('data-id');
            editFilm(filmId);
        }
    });
});
</script>
</body>
</html>

