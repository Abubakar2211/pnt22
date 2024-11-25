<?php
session_start();
include 'db.php'; // Database connection

$csvData = $_SESSION['csv_data'] ?? [];
$mapping = $_POST['mapping'] ?? [];
$formType = $_SESSION['form_type'] ?? 'add_contact';

if (empty($csvData) || empty($mapping)) {
    echo "No data to insert.";
    exit;
}

// Determine the main table based on form type
if ($formType === 'client') {
    $tableName = 'clients';
} elseif ($formType === 'add_contact') {
    $tableName = 'add_contacts';
} else {
    $tableName = 'contacts'; // Default to `contacts` table
}

foreach ($csvData as $index => $row) {
    // Skip the first row (index 0)
    if ($index === 0) {
        continue;
    }

    $insertData = [];
    foreach ($mapping as $csvIndex => $dbField) {
        if (!empty($dbField) && isset($row[$csvIndex])) {
            $value = trim($row[$csvIndex]);
            if (!empty($value)) {
                $insertData[$dbField] = mysqli_real_escape_string($con, $value);
            }
        }
    }

    if (empty($insertData)) {
        continue; // Skip empty insert
    }

    // Enclose field names in backticks if needed
    $columns = implode(", ", array_map(function ($field) {
        return '`' . $field . '`'; // Enclose in backticks
    }, array_keys($insertData)));

    $values = implode(", ", array_map(function ($value) {
        return "'" . $value . "'";
    }, array_values($insertData)));

    // Insert into the determined table
    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
    if (!mysqli_query($con, $query)) {
        echo "Error inserting into $tableName: " . mysqli_error($con);
        exit;
    }
}

// Clear the session data
session_unset();
session_destroy(); // Destroy the session

// Redirect based on form type
if ($formType === 'client') {
    $redirectUrl = 'clients.php';
} elseif ($formType === 'add_contact') {
    $redirectUrl = 'add-contacts.php';
} else {
    $redirectUrl = 'contacts.php';
}

header("Location: $redirectUrl");
exit;

include 'footer.php'; // This line will never be executed due to exit after header
