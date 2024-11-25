<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "INSERT INTO contacts_status (status) VALUES ('$status')";
    if (mysqli_query($con, $query)) {
        echo "Supplier added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
