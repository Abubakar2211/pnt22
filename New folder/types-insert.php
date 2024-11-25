<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = mysqli_real_escape_string($con, $_POST['type']);

    $query = "INSERT INTO types (type) VALUES ('$type')";
    if (mysqli_query($con, $query)) {
        echo "Supplier added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
