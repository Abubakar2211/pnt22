<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $listId = $_POST['listId'];
    $email = $_POST['email'];

    // Retrieve current list-emails
    $query = "SELECT `list-emails` FROM `lists` WHERE `id` = $listId";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $currentEmails = $row['list-emails'];

    // Append new email
    if (!empty($currentEmails)) {
        $newEmails = $currentEmails . ',' . $email;
    } else {
        $newEmails = $email;
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
