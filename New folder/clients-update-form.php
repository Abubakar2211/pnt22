<?php
include "db.php";
$clientId = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT * FROM clients WHERE id = $clientId";
$query = mysqli_query($con, $sql) or die("SQL Query Failed.");
$output = "";

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $output .= "<form id='update-form'>
        <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Update User Detail</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <label for='name' class='form-label'>Name</label>
            <input type='text' class='form-control mb-2' name='name' id='name' value='{$row['name']}' required>
            <label for='email' class='form-label'>Email</label>
            <input type='email' class='form-control mb-2' name='email' id='email' value='{$row['email']}' required>
            <label for='contact' class='form-label'>Contact</label>
            <input type='text' class='form-control mb-2' name='contact' id='contact' value='{$row['contact']}' required>
            <label for='cellPhone' class='form-label'>Cell Phone</label>
            <input type='number' class='form-control' name='cellPhone' id='cellPhone' value='{$row['cellPhone']}' required>
            <label for='cellNumber' class='form-label'>Cell Number</label>
            <input type='number' class='form-control' name='cellNumber' id='cellNumber' value='{$row['cellNumber']}' required>
            <label for='joining' class='form-label'>Joining</label>
            <input type='date' class='form-control' name='joining' id='joining' value='{$row['joining']}' required>
            <label for='companyName' class='form-label'>Company Name</label>
            <input type='text' class='form-control' name='companyName' id='companyName' value='{$row['companyName']}' required>
            <label for='clientStatus'>Client Status</label>
            <select class='form-select mb-2' name='clientStatus' id='clientStatus' aria-label='Default select example' required>
                <option value='active'" . ($row['clientStatus'] == 'active' ? ' selected' : '') . ">Active</option>
                <option value='deactive'" . ($row['clientStatus'] == 'deactive' ? ' selected' : '') . ">Deactive</option>
            </select>
            <label for='clientBoardcast'>Client Boardcast</label>
            <select class='form-select mb-2' name='clientBoardcast' id='clientBoardcast' aria-label='Default select example' required>
                <option value='active'" . ($row['clientBoardcast'] == 'active' ? ' selected' : '') . ">Active</option>
                <option value='deactive'" . ($row['clientBoardcast'] == 'deactive' ? ' selected' : '') . ">Deactive</option>
            </select>
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
