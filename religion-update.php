<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $religionId = mysqli_real_escape_string($con, $_POST["id"]);
    $religion = mysqli_real_escape_string($con, $_POST["religion"]);

    $sql = "UPDATE religion SET religion = '{$religion}' WHERE id = '{$religionId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
