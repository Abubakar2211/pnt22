<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $password = mysqli_real_escape_string($con,md5($_POST['password']));

    $query = "INSERT INTO teams (name, email, contact,designation, category, password) VALUES ('$name', '$email', '$contact', '$designation', '$category', '$password')";
    if (mysqli_query($con, $query)) {
        echo "Supplier added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
