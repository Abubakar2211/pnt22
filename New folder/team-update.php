<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teamId = mysqli_real_escape_string($con, $_POST["id"]);
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $contact = mysqli_real_escape_string($con, $_POST["contact"]);
    $designation = mysqli_real_escape_string($con, $_POST["designation"]);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $password = mysqli_real_escape_string($con, md5($_POST["password"]));

    $sql = "UPDATE teams SET name = '{$name}', email = '{$email}', contact = '{$contact}', designation = '{$designation}', category = '{$category}', password = '{$password}' WHERE id = '{$teamId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
