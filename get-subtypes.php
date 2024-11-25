<?php
include "db.php"; // Include your database connection

// Get the selected type_id from the POST request
$type_id = isset($_POST['type_id']) ? $_POST['type_id'] : '';

// Fetch the subtypes based on the type_id
if (!empty($type_id)) {
    $sql = "SELECT * FROM sub_types WHERE type_id = '" . mysqli_real_escape_string($con, $type_id) . "'";
    $result = mysqli_query($con, $sql);

    // Generate options for the sub_type dropdown
    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Choose a sub type</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['sub_type']) . '</option>';
        }
    } else {
        echo '<option value="">No sub types available</option>';
    }
} else {
    echo '<option value="">Choose a sub type</option>';
}
?>
