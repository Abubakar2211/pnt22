<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = mysqli_real_escape_string($con, $_POST['country']);

    $query = "INSERT INTO country (country) VALUES ('$country')";
    if (mysqli_query($con, $query)) {
        echo "Supplier added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
