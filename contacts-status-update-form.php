<?php
include "db.php";
$statusId = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT * FROM contacts_status WHERE id = $statusId"; 
$query = mysqli_query($con, $sql) or die("SQL Query Failed.");
$output = "";

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $output .= "<form id='update-form'>
        <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Statu Update</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <label for='status'>Name</label>
            <input type='text' class='form-control mb-2' name='status' id='status' value='{$row['status']}' required>
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
