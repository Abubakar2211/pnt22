<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $sub_type = mysqli_real_escape_string($con, $_POST['sub_type']);

    $type_query = "SELECT id FROM types WHERE type = '$type'";
    $type_result = mysqli_query($con, $type_query);


    $subTypeCheck = "SELECT * FROM sub_types WHERE sub_type = '$sub_type'";
    $result = mysqli_query($con, $subTypeCheck);

    if (mysqli_num_rows($result) > 0) {
        echo "This sub Type is already registered";
    } else {

        if (mysqli_num_rows($type_result) > 0) {
            $type_row = mysqli_fetch_assoc($type_result);
            $type_id = $type_row['id'];

            $query = "INSERT INTO sub_types (sub_type, type_id) VALUES ('$sub_type', '$type_id')";
            if (mysqli_query($con, $query)) {
                echo "Sub-type added successfully.";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Error: Type not found.";
        }
    }
}
