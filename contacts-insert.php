<?php
include 'db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $types = mysqli_real_escape_string($con, $_POST['types']);
    $sub_types = isset($_POST['sub_types']) ? mysqli_real_escape_string($con, $_POST['sub_types']) : NULL;
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = isset($_POST['last_name']) ? mysqli_real_escape_string($con, $_POST['last_name']) : NULL;
    $designation = isset($_POST['designation']) ? mysqli_real_escape_string($con, $_POST['designation']) : NULL;
    $email_id = mysqli_real_escape_string($con, $_POST['email_id']);
    $cell_number = isset($_POST['cell_number']) ? mysqli_real_escape_string($con, $_POST['cell_number']) : NULL;
    $phone_number = isset($_POST['phone_number']) ? mysqli_real_escape_string($con, $_POST['phone_number']) : NULL;
    $company_name = isset($_POST['company_name']) ? mysqli_real_escape_string($con, $_POST['company_name']) : NULL;
    $category = isset($_POST['category']) ? mysqli_real_escape_string($con, $_POST['category']) : NULL;
    $sub_category = isset($_POST['sub_category']) ? mysqli_real_escape_string($con, $_POST['sub_category']) : NULL;
    $website = isset($_POST['website']) ? mysqli_real_escape_string($con, $_POST['website']) : NULL;
    $country_field = isset($_POST['country']) ? mysqli_real_escape_string($con, $_POST['country']) : NULL;
    $city = isset($_POST['city']) ? mysqli_real_escape_string($con, $_POST['city']) : NULL;
    $D_O_B = isset($_POST['D_O_B']) ? mysqli_real_escape_string($con, $_POST['D_O_B']) : NULL;
    $religion = isset($_POST['religion']) ? mysqli_real_escape_string($con, $_POST['religion']) : NULL;
    $facebook = isset($_POST['facebook']) ? mysqli_real_escape_string($con, $_POST['facebook']) : NULL;

    $status = 'Active';

    // Check if status exists and insert if not
    $statusCheckQuery = "SELECT * FROM contacts_status WHERE status = '$status'";
    $statusCheckResult = mysqli_query($con, $statusCheckQuery);
    
    if (!$statusCheckResult || mysqli_num_rows($statusCheckResult) == 0) {
        $insertStatusQuery = "INSERT INTO contacts_status (status) VALUES ('$status')";
        if (!mysqli_query($con, $insertStatusQuery)) {
            die('Error adding status: ' . mysqli_error($con));
        }
    }
    

    $query = "INSERT INTO contacts (
        type, sub_type, first_name, last_name, designation, email_id, cell_number, phone_number,
        company_name, category, sub_category, website, country, city, D_O_B, religion, facebook, status
    ) VALUES (
        '$types', '$sub_types', '$first_name', '$last_name', '$designation', '$email_id', '$cell_number',
        '$phone_number', '$company_name', '$category', '$sub_category', '$website', '$country_field',
        '$city', '$D_O_B', '$religion', '$facebook', '$status'
    )";

 
    if (mysqli_query($con, $query)) {
        echo "Contact added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
