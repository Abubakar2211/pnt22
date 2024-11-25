<?php
include 'db.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $contactId = $_GET['id'];

    // Perform deletion
    $query = "DELETE FROM add_contacts WHERE id = '$contactId'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Contact deleted successfully.";
        // Redirect to display.php or any other page after deletion
        header('Location: add-contacts.php');
        exit;
    } else {
        echo "Error deleting contact: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
