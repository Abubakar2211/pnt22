<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactId = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $updateQuery = "UPDATE contacts SET status = '$status' WHERE id = '$contactId'";

    if (mysqli_query($con, $updateQuery)) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}
?>
