<?php
include  'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs (for security, omitted here for brevity)

    $name = $_POST['name'];  // Assuming 'name' is the input field for list-name
    $country = $_POST['country'];
    $quantity = $_POST['quantity'];
    
    // Define other values as needed
    $category = '';  // Set your category value
    $listEmails = '';  // Initially empty as per your requirement
    $status = 'no-records';  // Initial status

    // Construct the SQL query
    $sql = "INSERT INTO `lists` (`list-name`, `quantity`, `country`, `category`, `list-emails`, `status`) 
            VALUES ('$name', '$quantity', '$country', '$category', '$listEmails', '$status')";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // Success message and redirect using JavaScript
        echo '<script>';
        echo 'alert("List created successfully!");';
        echo 'window.location.href = "select-contact.php";'; // Redirect to select-contact.php
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close database connection
    mysqli_close($con);
}
?>
