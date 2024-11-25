<?php
include 'db.php'; // Include your database connection file

if (isset($_POST['id'])) {
    $contactId = $_POST['id'];

    // Fetch contact details
    $query = "SELECT * FROM add_contacts WHERE id = $contactId";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $contact = mysqli_fetch_assoc($result);
        
        // Display contact details
        echo "<p><strong>First Name:</strong> " . htmlspecialchars($contact['firstName']) . "</p>";
        echo "<p><strong>Last Name:</strong> " . htmlspecialchars($contact['lastName']) . "</p>";
        echo "<p><strong>Cell:</strong> " . htmlspecialchars($contact['cell']) . "</p>";
        echo "<p><strong>Landline:</strong> " . htmlspecialchars($contact['landline']) . "</p>";
        echo "<p><strong>Category:</strong> " . htmlspecialchars($contact['category']) . "</p>";
        echo "<p><strong>Country:</strong> " . htmlspecialchars($contact['country']) . "</p>";
        echo "<p><strong>Religion:</strong> " . htmlspecialchars($contact['religion']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($contact['Email']) . "</p>";
        echo "<p><strong>Website:</strong> " . htmlspecialchars($contact['website']) . "</p>";
        echo "<p><strong>Designation:</strong> " . htmlspecialchars($contact['designation']) . "</p>";
        echo "<p><strong>Company Name:</strong> " . htmlspecialchars($contact['companyName']) . "</p>";
    } else {
        echo "No contact found.";
    }

    mysqli_close($con);
}
?>
