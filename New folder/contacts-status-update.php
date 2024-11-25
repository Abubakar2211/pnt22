<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statusId = mysqli_real_escape_string($con, $_POST["id"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);

    $sql = "UPDATE contacts_status SET status = '{$status}' WHERE id = '{$statusId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
