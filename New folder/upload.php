<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];
    if (($handle = fopen($file, 'r')) !== false) {
        $csvData = [];
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $csvData[] = $data;
        }
        fclose($handle);
        // Pass the CSV data to display.php
        session_start();
        $_SESSION['csv_data'] = $csvData;
        header('Location: display.php');
        exit;
    }
} else {
    echo "No file uploaded.";
}
?>
