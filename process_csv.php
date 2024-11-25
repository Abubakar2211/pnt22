<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {
    $file = $_FILES["csv_file"];
    
    // Check if file is CSV
    $file_ext = pathinfo($file["name"], PATHINFO_EXTENSION);
    if ($file_ext != "csv") {
        $_SESSION['error'] = "Only CSV files are allowed.";
        header("Location: index.php");
        exit;
    }

    // Open CSV file and read data
    $csvData = [];
    if (($handle = fopen($file["tmp_name"], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $csvData[] = array_map("trim", $data);  // Trim data to remove whitespace
        }
        fclose($handle);
        $_SESSION['csv_data'] = $csvData;
        $_SESSION['success'] = "File uploaded successfully!";
    } else {
        $_SESSION['error'] = "Failed to open CSV file.";
    }

    // Redirect to the appropriate mapping page based on the form type
    $formType = $_SESSION['form_type'] ?? 'add_contact'; // Default to contact
    header("Location: display.php?formType=$formType");
    exit;
}
