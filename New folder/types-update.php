<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $typeId = mysqli_real_escape_string($con, $_POST["id"]);
    $type = mysqli_real_escape_string($con, $_POST["type"]);

    $sql = "UPDATE types SET type = '{$type}' WHERE id = '{$typeId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
