$(document).ready(function () {
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function () {
        if (this.checked) {
            checkbox.each(function () {
                this.checked = true;
            });
        } else {
            checkbox.each(function () {
                this.checked = false;
            });
        }
    });

    // JavaScript pour pré-remplir le formulaire d'édition
    $('#editEmployeeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Le bouton qui a ouvert le modal
        var id = button.data('id'); // Extrait l'ID de l'employé depuis les données attribut du bouton

        // Fait une requête AJAX pour récupérer les détails de l'employé
        $.ajax({
            type: 'GET',
            url: 'get_employee_details.php?id=' + id,
            success: function (response) {
                var employee = JSON.parse(response);

                // Pré-remplit les champs du formulaire avec les détails de l'employé
                $('#edit-id').val(employee.id);
                $('#edit-name').val(employee.name);
                $('#edit-email').val(employee.email);
                $('#edit-address').val(employee.address);
                $('#edit-phone').val(employee.phone);
            },
            error: function () {
                alert('Erreur lors de la récupération des détails de l\'employé.');
            }
        });
    });


    $(document).ready(function () {
        // Function to handle delete modal display
        $('.delete').on('click', function () {
            var id = $(this).data('id');
            $('#delete-employee-id').val(id);
            $('#deleteEmployeeModal').modal('show'); // Show the delete modal
        });

        // Activate tooltip if needed
        $('[data-toggle="tooltip"]').tooltip();
    });

    checkbox.click(function () {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});

