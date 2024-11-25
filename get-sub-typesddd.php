<?php
include "db.php";

if (isset($_POST['type_id'])) {
    $type_id = (int)$_POST['type_id']; // Ensure type_id is an integer

    // Fetch sub_types based on type_id
    $sql = "SELECT id, sub_type FROM sub_types WHERE type_id = $type_id";
    $result = mysqli_query($con, $sql) or die("SQL Query Failed: " . mysqli_error($con));

    $sub_types = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $sub_types[] = [
            'id' => $row['id'],
            'sub_type' => $row['sub_type']
        ];
    }

    echo json_encode($sub_types); // Return JSON response
    exit;
}
