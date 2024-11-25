<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $countryId = mysqli_real_escape_string($con, $_POST["id"]);
    $country = mysqli_real_escape_string($con, $_POST["country"]);

    $sql = "UPDATE country SET country = '{$country}' WHERE id = '{$countryId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
