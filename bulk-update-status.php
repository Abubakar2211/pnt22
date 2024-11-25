<?php
include "db.php";

if (isset($_POST['ids']) && isset($_POST['status'])) {
    $ids = $_POST['ids']; // Array of IDs
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $ids_string = implode(",", array_map('intval', $ids));

    $sql = "UPDATE contacts SET status = '$status' WHERE id IN ($ids_string)";
    if (mysqli_query($con, $sql)) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
} else {
    echo 0; // Invalid input
}
?>
