<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = mysqli_real_escape_string($con, $_POST['category']);

    $query = "INSERT INTO category (category) VALUES ('$category')";
    if (mysqli_query($con, $query)) {
        echo "Supplier added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
