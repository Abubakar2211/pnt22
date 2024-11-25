<?php
include "db.php";

if (isset($_POST['status'], $_POST['ids'])) {
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $ids = explode(',', $_POST['ids']);
    $ids = array_map('intval', $ids);
    $id_list = implode(',', $ids);

    $sql = "UPDATE contacts SET status = '$status' WHERE id IN ($id_list)";
    if (mysqli_query($con, $sql)) {
        echo "Status updated successfully.";
    } else {
        echo "Failed to update status.";
    }
} else {
    echo "Invalid request.";
}
?>
