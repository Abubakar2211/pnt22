<?php
include 'db.php'; // Ensure $con is available

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_id'], $_POST['list_id'], $_POST['email'])) {
    $contactId = intval($_POST['contact_id']);
    $listId = intval($_POST['list_id']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Begin a transaction for atomic operations
    mysqli_begin_transaction($con);

    // Update contact status to "listed"
    $updateQuery = "UPDATE contacts SET status = 'listed' WHERE id = $contactId";
    $updateResult = mysqli_query($con, $updateQuery);

    // Update list-emails in lists table for the specified list
    $fetchListEmailsQuery = "SELECT `list-emails` FROM lists WHERE id = $listId FOR UPDATE";
    $fetchListEmailsResult = mysqli_query($con, $fetchListEmailsQuery);

    if ($fetchListEmailsResult) {
        $listEmails = mysqli_fetch_assoc($fetchListEmailsResult)['list-emails'];
        if (empty($listEmails)) {
            $listEmails = $email; // Set the first email without leading comma
        } else {
            $listEmails .= ',' . $email; // Concatenate with comma
        }

        // Update list-emails in lists table
        $updateListQuery = "UPDATE lists SET `list-emails` = '$listEmails' WHERE id = $listId";
        $updateListResult = mysqli_query($con, $updateListQuery);

        // Commit or rollback transaction based on success
        if ($updateResult && $updateListResult) {
            mysqli_commit($con);
            echo json_encode(['success' => true]);
        } else {
            mysqli_rollback($con);
            echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
        }
    } else {
        mysqli_rollback($con);
        echo json_encode(['success' => false, 'error' => 'Error fetching list-emails']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
