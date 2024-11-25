<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientId = mysqli_real_escape_string($con, $_POST["id"]);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $cellPhone = mysqli_real_escape_string($con, $_POST['cellPhone']);
    $cellNumber = mysqli_real_escape_string($con, $_POST['cellNumber']);
    $joining = mysqli_real_escape_string($con, $_POST['joining']);
    $companyName = mysqli_real_escape_string($con, $_POST['companyName']);
    $clientStatus = mysqli_real_escape_string($con, $_POST['clientStatus']);
    $clientBoardcast = mysqli_real_escape_string($con, $_POST['clientBoardcast']);

    $sql = "UPDATE clients SET 
        name = '{$name}', 
        email = '{$email}', 
        contact = '{$contact}', 
        cellPhone = '{$cellPhone}', 
        cellNumber = '{$cellNumber}', 
        joining = '{$joining}', 
        companyName = '{$companyName}', 
        clientStatus = '{$clientStatus}', 
        clientBoardcast = '{$clientBoardcast}' 
        WHERE id = '{$clientId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;  // Success
    } else {
        echo 0;  // Error
    }
}
