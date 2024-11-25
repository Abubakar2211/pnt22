<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $password = mysqli_real_escape_string($con,md5($_POST['password']));

    $query = "INSERT INTO suppliers (name, email, contact, category, password) VALUES ('$name', '$email', '$contact', '$category', '$password')";
    if (mysqli_query($con, $query)) {
        echo "Supplier added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
