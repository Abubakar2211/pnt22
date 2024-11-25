<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $typeId = mysqli_real_escape_string($con, $_POST["id"]);
    $type = mysqli_real_escape_string($con, $_POST["type"]); // This should be type_id
    $sub_type = mysqli_real_escape_string($con, $_POST["sub_type"]);

    // Update query to set type_id instead of type
    $sql = "UPDATE sub_types SET type_id = '{$type}', sub_type = '{$sub_type}' WHERE id = '{$typeId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;  // Success
    } else {
        echo 0;  // Error
    }
}
?>
