<?php
session_start();
$csvData = $_SESSION['csv_data'] ?? [];
$mapping = $_POST['mapping'] ?? [];

// Database connection
include 'db.php'; // Assuming your connection file is db.php

if (empty($csvData) || empty($mapping)) {
    echo "No data to insert.";
    exit;
}

foreach ($csvData as $index => $row) {
    if ($index === 0) continue; // Skip header row

    $insertData = [];
    foreach ($mapping as $csvIndex => $dbField) {
        if (!empty($dbField)) {
            $insertData[$dbField] = $row[$csvIndex];
        }
    }

    if (!empty($insertData)) {
        $columns = implode(", ", array_keys($insertData));
        $values = implode(", ", array_map(function($value) use ($con) {
            return "'" . mysqli_real_escape_string($con, $value) . "'";
        }, array_values($insertData)));

        $query = "INSERT INTO contacts ($columns) VALUES ($values)";
        mysqli_query($con, $query);
    }
}

echo "<script>alert('Thanks for uploading!'); window.location.href='index.php';</script>";
?>
