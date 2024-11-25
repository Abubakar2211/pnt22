<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $emailCheck = "SELECT * FROM suppliers WHERE email = '$email'";
    $result = mysqli_query($con, $emailCheck);

    if (mysqli_num_rows($result) > 0) {
        echo "This email is already registered.";
    } else {

        $query = "INSERT INTO suppliers (name, email, contact, category, password) VALUES ('$name', '$email', '$contact', '$category', '$password')";
        if (mysqli_query($con, $query)) {
            echo "Supplier added successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
