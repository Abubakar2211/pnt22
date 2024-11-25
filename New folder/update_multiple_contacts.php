<?php
include 'db.php'; // Ensure $con is available

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['list_id'], $_POST['emails'])) {
    $listId = intval($_POST['list_id']);
    $emails = $_POST['emails'];

    // Begin a transaction for atomic operations
    mysqli_begin_transaction($con);

    foreach ($emails as $email) {
        // Check if email already exists in the list
        $checkQuery = "SELECT * FROM lists WHERE id = $listId AND FIND_IN_SET('$email', `list-emails`)";
        $checkResult = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($checkResult) == 0) {
            // Fetch current list-emails to handle empty case
            $fetchQuery = "SELECT `list-emails` FROM lists WHERE id = $listId";
            $fetchResult = mysqli_query($con, $fetchQuery);
            $row = mysqli_fetch_assoc($fetchResult);
            $currentListEmails = $row['list-emails'];

            // Update list-emails in lists table
            if (empty($currentListEmails)) {
                $updateListQuery = "UPDATE lists SET `list-emails` = '$email' WHERE id = $listId";
            } else {
                $updateListQuery = "UPDATE lists SET `list-emails` = CONCAT_WS(',', `list-emails`, '$email') WHERE id = $listId";
            }

            $updateListResult = mysqli_query($con, $updateListQuery);

            if (!$updateListResult) {
                mysqli_rollback($con);
                echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
                exit;
            }
        }
    }

    // Commit transaction
    mysqli_commit($con);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
