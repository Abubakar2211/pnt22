<?php
include 'db.php'; // Database connection include karein.

if (isset($_POST['type_id'])) {
    $type_id = (int)$_POST['type_id']; // Ensure type_id is an integer.

    // Sub types fetch karne ke liye SQL query
    $sql = "SELECT id, sub_type FROM sub_types WHERE type_id = $type_id";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        $sub_types = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($sub_types); // JSON response
    } else {
        echo json_encode([]); // Empty response agar koi result na mile
    }
}
?>
