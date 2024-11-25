<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $religion = mysqli_real_escape_string($con, $_POST['religion']);

    $religionCheck = "SELECT * FROM religion WHERE religion = '$religion'";
    $result = mysqli_query($con, $religionCheck);

    if (mysqli_num_rows($result) > 0) {
        echo "This religion is already registered.";
    } else {

        $query = "INSERT INTO religion (religion) VALUES ('$religion')";
        if (mysqli_query($con, $query)) {
            echo "Supplier added successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
