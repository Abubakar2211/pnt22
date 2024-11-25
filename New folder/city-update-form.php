<?php
include "db.php";

$countryId = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT country.id as country_id, country.country, city.city, city.id 
        FROM city 
        INNER JOIN country ON country.id = city.country_id 
        WHERE city.id = '{$countryId}'";
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

            <label for='country' class='form-label'>Select Country:</label>
            <select name='country' id='country' class='form-control'>";

    $typesSql = "SELECT id, country FROM country"; 
    $result = mysqli_query($con, $typesSql);

    if (mysqli_num_rows($result) > 0) {
        while ($typeRow = mysqli_fetch_assoc($result)) {
            $selected = ($typeRow['id'] == $row['country_id']) ? "selected" : "";  
            $output .= "<option value='" . htmlspecialchars($typeRow['id']) . "' $selected>" . htmlspecialchars($typeRow['country']) . "</option>";
        }
    } else {
        $output .= "<option>No countries available</option>";
    }

    $output .= "</select>

            <label for='city' class='form-label'>City</label>
            <input type='text' class='form-control mb-2' name='city' id='city' value='" . htmlspecialchars($row['city']) . "' required>
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

