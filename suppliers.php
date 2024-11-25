<?php
include 'header.php';
include 'db.php'; // Include your database connection file


?>
<!-- Include necessary CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- Include Bootstrap CSS if using Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<!-- Font Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="content container">
    <div class="list-header d-flex justify-content-between align-items-center my-4">
        <h2>Supplier Details</h2>
    </div>

    <div class="form-container mb-3">
        <form action="" id="supplier-form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col-md-4 ">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="contact" class="form-control" id="contact" placeholder="Enter contact" name="contact">
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="category" class="form-label">Category:</label>
                    <select class="form-select" name="category" id="category" aria-label="Default select example">
                        <option selected value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="mb-3 col-md-4 ">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
            </div>
            <button type="submit" id="team-submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="response" class="my-2"></div>


    </div>

    <div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be dynamically loaded here -->
            </div>
        </div>
    </div>


    <!-- Display DataTable -->
    <div class="datatable-container mt-4" id="supplier-table">


    </div>
</div>

<!-- Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Contact Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="contactDetails">
                <!-- Details will be loaded here via AJAX -->
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!-- Include necessary JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contactsTable').DataTable();

        function loadTable() {
            $.ajax({
                url: "suppliers-load.php",
                type: "POST",
                success: function(data) {
                    $('#supplier-table').html(data);
                    $('#contactsTable').DataTable();
                }
            });
        }
        loadTable();

        $('#team-submit').on("click", function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var email = $("#email").val();
            var contact = $("#contact").val();
            var category = $('#category').val();
            var password = $("#password").val();

            if (name == "" || email == "" || contact == ""  || !category || password == "") {
                $('#response').fadeIn();
                $('#response').removeClass('alert alert-primary').addClass('alert alert-danger').html('All fields are required');
            } else {
                $.ajax({
                    url: "suppliers-insert.php",
                    type: "POST",
                    data: $('#supplier-form').serialize(),
                    success: function(data) {
                        $('#supplier-form')[0].reset();
                        loadTable();
                        $('#response').fadeIn();
                        $('#response').removeClass('alert alert-danger').addClass('alert alert-primary').html(data);
                        setTimeout(function() {
                            $('#response').fadeOut("slow");
                        }, 4000);
                    }
                });
            }
        });

        $(document).on("click", ".delete-btn", function() {
                var supplierId = $(this).data('id');
                var element = this;
                $.ajax({
                    url: "suppliers-delete.php",
                    type: "POST",
                    data: {
                        id: supplierId
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(element).closest("tr").fadeOut();
                            loadTable();
                        } else {
                            $("#error_message").html("Can't Delete Record.").slideDown();
                            $("#success_message").slideUp();
                        }
                    }
                })
        });
        $(document).on("click", ".edit-btn", function() {
            var supplierId = $(this).data("eid");

            $("#update-modal .modal-content").html("");
            $("#update-modal").modal('show');

            $.ajax({
                url: "suppliers-update-form.php",
                type: "POST",
                data: {
                    id: supplierId
                },
                success: function(data) {
                    $("#update-modal .modal-content").html(data);
                },

            });
        });

        $(document).on("click", "#save_button", function() {
            var formData = $('#update-form').serialize(); 

            $.ajax({
                url: "suppliers-update.php",
                type: "POST",
                data: formData,
                success: function(data) {
                    if (data == 1) {
                        $("#update-modal").modal('hide');
                        loadTable(); 
                    } else {
                        alert("Error updating supplier data: " + data);
                    }
                },

            });
        });

    });
</script>