<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $listId = $_POST['listId'];
    $emails = $_POST['emails']; // Assume emails are sent as a comma-separated string

    // Retrieve current list-emails
    $query = "SELECT `list-emails` FROM `lists` WHERE `id` = $listId";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $currentEmails = $row['list-emails'];

    // Append new emails
    if (!empty($currentEmails)) {
        $newEmails = $currentEmails . ',' . $emails;
    } else {
        $newEmails = $emails;
    }

    // Update the list-emails in the database
    $updateQuery = "UPDATE `lists` SET `list-emails` = '$newEmails' WHERE `id` = $listId";
    if (mysqli_query($con, $updateQuery)) {
        echo 'success';
    } else {
        echo 'error';
    }

    mysqli_close($con);
}
?>
