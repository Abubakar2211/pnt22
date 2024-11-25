<?php
include 'header.php';

if (isset($_POST['add_all'])) {
    $list_id = intval($_GET['list_id']);
    $quantity = intval($_GET['quantity']);

    // Fetch all contacts with the given quantity limit
    $query = "SELECT * FROM contacts LIMIT $quantity";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $emailsToAdd = [];
        while ($contact = mysqli_fetch_assoc($result)) {
            $emailsToAdd[] = $contact['Email'];

            // Optionally, update contact status
            $contact_id = $contact['id'];
            $updateQuery = "UPDATE contacts SET status = 'added' WHERE id = $contact_id";
            mysqli_query($con, $updateQuery);
        }

        // Fetch current list-emails from lists table
        $fetchQuery = "SELECT `list-emails` FROM lists WHERE id = $list_id";
        $fetchResult = mysqli_query($con, $fetchQuery);
        $data = mysqli_fetch_assoc($fetchResult);
        $currentEmails = json_decode($data['list-emails'], true);

        if (!is_array($currentEmails)) {
            $currentEmails = [];
        }

        // Merge new emails with existing ones and remove duplicates
        $updatedEmails = array_unique(array_merge($currentEmails, $emailsToAdd));

        // Update list-emails field in lists table
        $updatedEmailsJSON = json_encode($updatedEmails);
        $updateListQuery = "UPDATE lists SET `list-emails` = '$updatedEmailsJSON' WHERE id = $list_id";
        mysqli_query($con, $updateListQuery);

        echo "<script>alert('All contacts have been added to the list.')</script>";
         header("Location: email-listings.php?list_id=$list_id&quantity=$quantity");
            exit;
    } else {
        echo "No contacts found.";
    }

    // Redirect back to the original page
   
   
}

include 'footer.php';
?>
