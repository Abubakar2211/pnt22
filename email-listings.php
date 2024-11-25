<?php include 'header.php';?> 
<?php include 'db.php';?> 

<div class="content container">
    <div class="list-header d-flex justify-content-between align-items-center my-4">
        <h2>List</h2>
        <button class="btn btn-primary" onclick="window.location.href='create-list.php'">Create List</button>
    </div>

    <!-- DataTable -->
    <div class="datatable-container mt-4">
        <table id="listsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Country</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT `id`, `list-name`, `quantity`, `country`, `category`, `list-emails`, `status` FROM `lists`";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    $counter = 1; // Initialize the counter
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td>{$row['list-name']}</td>";
                        echo "<td>{$row['quantity']}</td>";
                        echo "<td>{$row['country']}</td>";
                        echo "<td>{$row['category']}</td>";
                        echo "<td>
                                <button class='btn btn-primary btn-sm' onclick='viewDetails({$row['id']})'>Details</button>
                                <button class='btn btn-danger btn-sm' onclick='deleteList({$row['id']})'>Delete</button>
                              </td>";
                        echo "</tr>";
                        $counter++; // Increment the counter
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php';?> 

<!-- Include necessary JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#listsTable').DataTable();
    });

    // Function to view details of a list
    function viewDetails(listId) {
        window.location.href = 'list-details.php?listId=' + listId;
    }

     // Function to delete a list
    function deleteList(listId) {
        if (confirm("Are you sure you want to delete this list?")) {
            $.ajax({
                url: 'delete-list.php',
                type: 'POST',
                data: { id: listId },
                success: function(response) {
                    if (response.trim() === 'success') {
                        alert('List deleted successfully.');
                        location.reload(); // Reload the page to reflect changes
                    } else {
                        alert('Error deleting list: ' + response);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('Error: ' + thrownError);
                }
            });
        }
    }
</script>
