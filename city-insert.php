<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $city = mysqli_real_escape_string($con, $_POST['city']);

    $country_query = "SELECT id FROM country WHERE country = '$country'";
    $country_result = mysqli_query($con, $country_query);

    if (mysqli_num_rows($country_result) > 0) {
        $country_row = mysqli_fetch_assoc($country_result);
        $country_id = $country_row['id'];

        $query = "INSERT INTO city (city, country_id) VALUES ('$city', '$country_id')";
        if (mysqli_query($con, $query)) {
            echo "City added successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: Country not found.";
    }
}
