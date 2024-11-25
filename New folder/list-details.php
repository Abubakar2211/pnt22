<?php include 'header.php';?> 
<?php include 'db.php';

$lID = $_GET['listId'];
?> 

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
                    <th>Contacts</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT `id`, `list-name`, `quantity`, `country`, `category`, `list-emails`, `status` FROM `lists` WHERE `id` = '$lID'";
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
                        echo "<td>";
                        
                        $emails = $row['list-emails'];

                        // Check if the emails are in JSON format
                        $decoded_emails = json_decode($emails, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            // JSON format
                            if (is_array($decoded_emails)) {
                                foreach ($decoded_emails as $email) {
                                    echo htmlspecialchars($email) . "<br>";
                                }
                            }
                        } else {
                            // Handle single email or comma-separated emails
                            $emails_array = explode(',', $emails);
                            foreach ($emails_array as $email) {
                                echo htmlspecialchars(trim($email)) . "<br>";
                            }
                        }

                        echo "</td>";
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
