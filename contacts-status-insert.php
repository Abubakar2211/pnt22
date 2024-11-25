<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $statusCheck = "SELECT * FROM contacts_status WHERE status = '$status'";
    $result = mysqli_query($con,$statusCheck);

    if(mysqli_num_rows($result) > 0){
        echo "This status is already registered.";
    }else{
        $query = "INSERT INTO contacts_status (status) VALUES ('$status')";
        if (mysqli_query($con, $query)) {
            echo "Supplier added successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

}
