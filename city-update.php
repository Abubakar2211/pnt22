<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $countryId = mysqli_real_escape_string($con, $_POST["id"]);
    $country = mysqli_real_escape_string($con, $_POST["country"]); 
    $city = mysqli_real_escape_string($con, $_POST["city"]);

    $sql = "UPDATE city SET country_id = '{$country}', city = '{$city}' WHERE id = '{$countryId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;  
    } else {
        echo 0;  
    }
}
?>
