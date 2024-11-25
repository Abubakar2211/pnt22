<?php
include "db.php";
$contactId = mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT * FROM contacts WHERE id = '$contactId'"; // Ensure that the ID is safely handled
$query = mysqli_query($con, $sql) or die("SQL Query Failed: " . mysqli_error($con));
$output = "";

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $output .= "<form id='update-form' method='POST'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Update User Detail</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='mb-3 col-md-6'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <label for='type' class='form-label'>Types:</label>
                                <select name='type' class='form-control' id='type'>
                                    <option value=''>Choose a type</option>";

    // Fetch types 
    $sql_type = "SELECT * FROM types";
    $result_type = mysqli_query($con, $sql_type) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_type = mysqli_fetch_assoc($result_type)) {
        $selected = ($row_type['id'] == $row['type']) ? "selected" : "";
        $output .= "<option value='" . $row_type['id'] . "' $selected>" . $row_type['type'] . "</option>";
    }

    $output .= "</select></div>
                <div class='mb-3 col-md-6'>
                    <label for='sub_type' class='form-label'>Sub types:</label>
                    <select name='sub_type' class='form-control' id='sub_type'>
                        <option value=''>Choose a Sub Type</option>";

    // Fetch sub_types
    $sql_sub_type = "SELECT * FROM sub_types ";
    $result_sub_type = mysqli_query($con, $sql_sub_type) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_sub_type = mysqli_fetch_assoc($result_sub_type)) {
        $selected = ($row_sub_type['id'] == $row['sub_type']) ? "selected" : "";
        $output .= "<option value='" . $row_sub_type['id'] . "' $selected>" . $row_sub_type['sub_type'] . "</option>";
    }

    $output .= "</select></div>
                <div class='mb-3 col-md-6'>
                    <label for='first_name' class='form-label'>First Name:</label>
                    <input type='text' class='form-control' id='first_name' placeholder='Enter first name' value='{$row['first_name']}' name='first_name'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='last_name' class='form-label'>Last Name:</label>
                    <input type='text' class='form-control' id='last_name' placeholder='Enter last name' value='{$row['last_name']}' name='last_name'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='designation' class='form-label'>Designation:</label>
                    <input type='text' class='form-control' id='designation' placeholder='Enter designation' value='{$row['designation']}' name='designation'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='email_id' class='form-label'>Email:</label>
                    <input type='email' class='form-control' id='email_id' placeholder='Enter email' value='{$row['email_id']}' name='email_id'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='cell_number' class='form-label'>Cell Number:</label>
                    <input type='text' class='form-control' id='cell_number' placeholder='Enter cell number' value='{$row['cell_number']}' name='cell_number'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='phone_number' class='form-label'>Phone Number:</label>
                    <input type='text' class='form-control' id='phone_number' placeholder='Enter phone number' value='{$row['phone_number']}' name='phone_number'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='company_name' class='form-label'>Company Name:</label>
                    <input type='text' class='form-control' id='company_name' placeholder='Enter company name' value='{$row['company_name']}' name='company_name'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='category' class='form-label'>Category:</label>
                    <select name='category' class='form-control' id='category'>
                        <option value=''>Choose a category</option>";

    // Fetch categories
    $sql_category = "SELECT * FROM category";
    $result_category = mysqli_query($con, $sql_category) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_category = mysqli_fetch_assoc($result_category)) {
        $selected = ($row_category['category'] == $row['category']) ? "selected" : "";
        $output .= "<option value='" . $row_category['category'] . "' $selected>" . $row_category['category'] . "</option>";
    }

    $output .= "</select></div>
                <div class='mb-3 col-md-6'>
                    <label for='sub_category' class='form-label'>Sub Category:</label>
                    <select name='sub_category' class='form-control' id='sub_category'>
                        <option value=''>Choose a sub category</option>";

    // Fetch sub-categories
    $sql_sub_category = "SELECT * FROM sub_category";
    $result_sub_category = mysqli_query($con, $sql_sub_category) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_sub_category = mysqli_fetch_assoc($result_sub_category)) {
        $selected = ($row_sub_category['sub_category'] == $row['sub_category']) ? "selected" : "";
        $output .= "<option value='" . $row_sub_category['sub_category'] . "' $selected>" . $row_sub_category['sub_category'] . "</option>";
    }

    $output .= "</select></div>
                <div class='mb-3 col-md-6'>
                    <label for='website' class='form-label'>Website:</label>
                    <input type='text' class='form-control' id='website' placeholder='Enter website' value='{$row['website']}' name='website'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='country' class='form-label'>Country:</label>
                    <select name='country' class='form-control' id='country'>
                        <option value=''>Choose a country</option>";

    // Fetch countries
    $sql_country = "SELECT * FROM country";
    $result_country = mysqli_query($con, $sql_country) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_country = mysqli_fetch_assoc($result_country)) {
        $selected = ($row_country['country'] == $row['country']) ? "selected" : "";
        $output .= "<option value='" . $row_country['country'] . "' $selected>" . $row_country['country'] . "</option>";
    }

    $output .= "</select></div>
                <div class='mb-3 col-md-6'>
                    <label for='city' class='form-label'>City:</label>
                    <select name='city' class='form-control' id='city'>
                        <option value=''>Choose a city</option>";

    $sql_city = "SELECT * FROM city";
    $result_city = mysqli_query($con, $sql_city) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_city = mysqli_fetch_assoc($result_city)) {
        $selected = ($row_city['city'] == $row['city']) ? "selected" : "";
        $output .= "<option value='" . $row_city['city'] . "' $selected>" . $row_city['city'] . "</option>";
    }

    $output .= "</select></div>
                <div class='mb-3 col-md-6'>
                    <label for='D_O_B' class='form-label'>Date of Birth:</label>
                    <input type='date' class='form-control' id='D_O_B' value='{$row['D_O_B']}' name='D_O_B'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='religion' class='form-label'>Religion:</label>
                    <select name='religion' class='form-control' id='religion'>
                        <option value=''>Choose religion</option>";

    // Fetch religions
    $sql_religion = "SELECT * FROM religion";
    $result_religion = mysqli_query($con, $sql_religion) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_religion = mysqli_fetch_assoc($result_religion)) {
        $selected = ($row_religion['religion'] == $row['religion']) ? "selected" : "";
        $output .= "<option value='" . $row_religion['religion'] . "' $selected>" . $row_religion['religion'] . "</option>";
    }

    $output .= "</select></div>
            <div class='mb-3 col-md-6'>
                    <label for='facebook' class='form-label'>Facebook:</label>
                    <input type='text' class='form-control' id='facebook' placeholder='Enter facebook' value='{$row['facebook']}' name='facebook'>
                </div>
                <div class='mb-3 col-md-6'>
                    <label for='status' class='form-label'>Status:</label>
                    <select name='status' class='form-control' id='status'>
                        <option value=''>Choose status</option>";

    // Fetch statuss
    $sql_status = "SELECT * FROM contacts_status";
    $result_status = mysqli_query($con, $sql_status) or die("SQL Query Failed: " . mysqli_error($con));
    while ($row_status = mysqli_fetch_assoc($result_status)) {
        $selected = ($row_status['status'] == $row['status']) ? "selected" : "";
        $output .= "<option value='" . $row_status['status'] . "' $selected>" . $row_status['status'] . "</option>";
    }

    $output .= "</select></div> 

                </div>
                </div>
                <div class='modal-footer'>
                    <button type='submit' class='btn btn-primary' id='save_button'>Submit</button>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                </div>
                </form>";
}
echo $output;
