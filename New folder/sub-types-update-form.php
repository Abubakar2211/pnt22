<?php
include "db.php";

$typeId = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT types.id as type_id, types.type, sub_types.sub_type, sub_types.id 
        FROM sub_types 
        INNER JOIN types ON types.id = sub_types.type_id 
        WHERE sub_types.id = '{$typeId}'";
$query = mysqli_query($con, $sql) or die("SQL Query Failed.");
$output = "";

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);

    $output .= "<form id='update-form'>
        <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Team Detail</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
            <input type='hidden' name='id' value='{$row['id']}'>  

            <label for='type' class='form-label'>Select Type:</label>
            <select name='type' id='type' class='form-control'>";

    // Fetch types for the dropdown
    $typesSql = "SELECT id, type FROM types"; 
    $result = mysqli_query($con, $typesSql);

    if (mysqli_num_rows($result) > 0) {
        while ($typeRow = mysqli_fetch_assoc($result)) {
            $selected = ($typeRow['id'] == $row['type_id']) ? "selected" : "";  
            $output .= "<option value='" . htmlspecialchars($typeRow['id']) . "' $selected>" . htmlspecialchars($typeRow['type']) . "</option>";
        }
    } else {
        $output .= "<option>No types available</option>";
    }

    $output .= "</select>

            <label for='sub_type' class='form-label'>Sub Type</label>
            <input type='text' class='form-control mb-2' name='sub_type' id='sub_type' value='" . htmlspecialchars($row['sub_type']) . "' required>
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
            <button type='button' class='btn btn-primary' id='save_button'>Save changes</button>
        </div>
    </form>";
} else {
    $output = "Data not found";
}

echo $output;
?>
