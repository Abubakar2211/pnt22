<?php
session_start();
$_SESSION['form_type'] = 'add_contact'; // Set session variable for contact
include 'header.php';
include 'db.php';
?>
<!-- Include necessary CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- Include Bootstrap CSS if using Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<!-- Font Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="content container">
    <div class="list-header d-flex justify-content-between align-items-center my-4">
        <h2>Contacts</h2>
    </div>

    <div class="form-container d-flex align-items-center mb-3">
        <form action="select-csv.php" method="post" enctype="multipart/form-data" class="d-flex align-items-center">
            <div class="form-group me-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="fileToUpload" id="fileToUpload">
                    <label class="form-check-label" for="import">Import contacts from a file</label>
                </div>
                <button type="submit" class="btn btn-primary" value="Upload File" name="submit">Create</button>
            </div>
        </form>
        <a href="add-new.php" class="btn btn-secondary ms-auto">Add New</a>
    </div>

    <!-- Display DataTable -->
    <div class="datatable-container mt-4">
        <table id="contactsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch records from the database
                $query = "SELECT * FROM `add_contacts`";
                $result = mysqli_query($con, $query);
                $c = mysqli_num_rows($result);
                $i = 1;

                if ($c > 0) {
                    while ($contacts = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= !empty($contacts['lastName']) ? $contacts['firstName'] . ' ' . $contacts['lastName'] : $contacts['firstName'] ?></td>
                            <td><?= $contacts['Email'] ?></td>
                            <td><?= $contacts['category'] ?></td>
                            <td><?= $contacts['country'] ?></td>
                            <td>
                                <button class="btn btn-sm" onclick="showDetailsModal(<?= $contacts['id'] ?>)">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-sm" onclick="deleteContact(<?= $contacts['id'] ?>)">
                                    <i class='fa-solid fa-delete-left'></i>
                                </button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No contacts found</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
        // Initialize DataTable
        $('#contactsTable').DataTable();
    });

    // Function to handle showing details modal
    function showDetailsModal(contactId) {
        // AJAX request to fetch contact details
        $.ajax({
            url: 'fetch_contact.php',
            type: 'post',
            data: {
                id: contactId
            },
            success: function(response) {
                $('#contactDetails').html(response);
                $('#detailsModal').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error('Error fetching contact details:', thrownError);
            }
        });
    }

    // Function to handle contact deletion
    function deleteContact(contactId) {
        // Assuming you have a separate delete script
        if (confirm('Are you sure you want to delete this contact?')) {
            window.location.href = 'delete.php?id=' + contactId;
        }
    }
</script>
