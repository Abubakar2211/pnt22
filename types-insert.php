<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = mysqli_real_escape_string($con, $_POST['type']);

    $checkTypeQuery = "SELECT * FROM types WHERE type = '$type'";
    $result = mysqli_query($con, $checkTypeQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "This Type already Registerd";
    } else {
        $query = "INSERT INTO types (type) VALUES ('$type')";
        if (mysqli_query($con, $query)) {
            echo "Supplier added successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
