<?php
include "db.php";
$teamId = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT * FROM teams WHERE id = $teamId"; 
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
            <label for='name'>Name</label>
            <input type='text' class='form-control mb-2' name='name' id='name' value='{$row['name']}' required>
            <label for='email'>Email</label>
            <input type='email' class='form-control mb-2' name='email' id='email' value='{$row['email']}' required>
            <label for='contact'>Contact</label>
            <input type='text' class='form-control mb-2' name='contact' id='contact' value='{$row['contact']}' required>
            <label for='designation'>Designation</label>
            <input type='text' class='form-control mb-2' name='designation' id='designation' value='{$row['designation']}' required>
            <label for='category'>Category</label>
            <select class='form-select mb-2' name='category' id='category' aria-label='Default select example'>
                <option value='1'" . ($row['category'] == 1 ? ' selected' : '') . ">Admin</option>
                <option value='2'" . ($row['category'] == 2 ? ' selected' : '') . ">User</option>
            </select>
            <label for='password'>Password</label>
            <input type='password' class='form-control mb-2' name='password' id='password' value='{$row['password']}' required>
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
