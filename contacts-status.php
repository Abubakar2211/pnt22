<?php
include 'header.php';
include 'db.php';
?>

<!-- Include necessary CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Contact Status</h2>
        <a href="select-csv.php" class="btn btn-primary">Upload CSV File</a>
    </div>

    <!-- Form 1: Adding a New Status -->
    <div class="row">
        <div class="form-container mb-3">
            <form action="" id="add-status-form" method="post" enctype="multipart/form-data" class="p-3 border rounded">
                <div class="row">
                    <div class="mb-3">
                        <label for="status" class="form-label">Enter Status:</label>
                        <input type="text" class="form-control" id="status" placeholder="Enter status" name="status">
                    </div>
                </div>
                <button type="submit" id="add-status-submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Response Message -->
    <div id="response" class="my-2"></div>

    <!-- DataTable Display -->
    <div class="datatable-container mt-4" id="contact-status-table"></div>
</div>

<!-- Modal for Update Form -->
<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Content will be dynamically loaded here -->
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- JavaScript and DataTable scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#contactStatusTable').DataTable();

        function loadTable() {
            $.ajax({
                url: "contacts-status-load.php",
                type: "POST",
                success: function(data) {
                    $('#contact-status-table').html(data);
                    $('#contactStatusTable').DataTable();
                }
            });
        }
        loadTable();

        $('#add-status-submit').on("click", function(e) {
            e.preventDefault();
            var status = $("#status").val();

            if (status == "") {
                $('#response').fadeIn().removeClass('alert alert-primary').addClass('alert alert-danger').html('All fields are required');
            } else {
                $.ajax({
                    url: "contacts-status-insert.php",
                    type: "POST",
                    data: $('#add-status-form').serialize(),
                    success: function(data) {
                        $('#add-status-form')[0].reset();
                        loadTable();
                        $('#response').fadeIn().removeClass('alert alert-danger').addClass('alert alert-primary').html(data);
                        setTimeout(function() {
                            $('#response').fadeOut("slow");
                        }, 4000);
                    },
                    error: function(xhr) {
                        $('#response').fadeIn().removeClass('alert alert-primary').addClass('alert alert-danger').html('An error occurred: ' + xhr.responseText);
                    }
                });
            }
        });

        $('#select-status-submit').on("click", function(e) {
            e.preventDefault();

            // Retrieve the selected status value
            var appliedStatus = $("#applied_status").val();

            // Check if a status was selected
            if (appliedStatus) {
                $.ajax({
                    url: "contacts-status-submit.php",
                    type: "POST",
                    data: {
                        applied_status: appliedStatus
                    },
                    success: function(data) {
                        alert(data);
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + xhr.responseText);
                    }
                });
            } else {
                alert("Please select a status.");
            }
        });


        // Delete, Edit, and Save functionality
        $(document).on("click", ".delete-btn", function() {
                var statusId = $(this).data('id');
                var element = this;
                $.ajax({
                    url: "contacts-status-delete.php",
                    type: "POST",
                    data: {
                        id: statusId
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
            var statusId = $(this).data("eid");

            $("#update-modal .modal-content").html("");
            $("#update-modal").modal('show');

            $.ajax({
                url: "contacts-status-update-form.php",
                type: "POST",
                data: {
                    id: statusId
                },
                success: function(data) {
                    $("#update-modal .modal-content").html(data);
                },
            });
        });

        $(document).on("click", "#save_button", function() {
            var formData = $('#update-form').serialize();

            $.ajax({
                url: "contacts-status-update.php",
                type: "POST",
                data: formData,
                success: function(data) {
                    if (data == 1) {
                        $("#update-modal").modal('hide');
                        loadTable();
                    } else {
                        alert("Error updating type data: " + data);
                    }
                },
            });
        });
    });
</script>