<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $cellPhone = mysqli_real_escape_string($con, $_POST['cellPhone']);
    $cellNumber = mysqli_real_escape_string($con, $_POST['cellNumber']);
    $joining = mysqli_real_escape_string($con, $_POST['joining']);
    $companyName = mysqli_real_escape_string($con, $_POST['companyName']);
    $clientStatus = mysqli_real_escape_string($con, $_POST['clientStatus']);
    $clientBoardcast = mysqli_real_escape_string($con, $_POST['clientBoardcast']);

    $emailCheck = "SELECT * FROM clients WHERE email = '$email'";
    $result = mysqli_query($con, $emailCheck);

    if (mysqli_num_rows($result) > 0) {
        echo "This email is already registered.";
    } else {

        $query = "INSERT INTO clients (name, email, contact, cellPhone, cellNumber, joining, companyName, clientStatus, clientBoardcast)
              VALUES ('$name', '$email', '$contact', '$cellPhone', '$cellNumber', '$joining', '$companyName', '$clientStatus', '$clientBoardcast')";

        if (mysqli_query($con, $query)) {
            echo "Client added successfully.";
        } else {
            echo "Error: " . mysqli_error($con); // Log or display error for debugging
        }
    }
}
