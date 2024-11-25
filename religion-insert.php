<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $religion = mysqli_real_escape_string($con, $_POST['religion']);

    $query = "INSERT INTO religion (religion) VALUES ('$religion')";
    if (mysqli_query($con, $query)) {
        echo "Supplier added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
