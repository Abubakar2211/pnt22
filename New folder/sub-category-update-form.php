<?php
include "db.php";

$categoryId = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT category.id as category_id, category.category, sub_category.sub_category, sub_category.id 
        FROM sub_category 
        INNER JOIN category ON category.id = sub_category.category_id 
        WHERE sub_category.id = '{$categoryId}'";
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

            <label for='category' class='form-label'>Select Category:</label>
            <select name='category' id='category' class='form-control'>";

    $typesSql = "SELECT id, category FROM category"; 
    $result = mysqli_query($con, $typesSql);

    if (mysqli_num_rows($result) > 0) {
        while ($typeRow = mysqli_fetch_assoc($result)) {
            $selected = ($typeRow['id'] == $row['category_id']) ? "selected" : "";  
            $output .= "<option value='" . htmlspecialchars($typeRow['id']) . "' $selected>" . htmlspecialchars($typeRow['category']) . "</option>";
        }
    } else {
        $output .= "<option>No categories available</option>";
    }

    $output .= "</select>

            <label for='sub_category' class='form-label'>Sub category</label>
            <input type='text' class='form-control mb-2' name='sub_category' id='sub_category' value='" . htmlspecialchars($row['sub_category']) . "' required>
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
