<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryId = mysqli_real_escape_string($con, $_POST["id"]);
    $category = mysqli_real_escape_string($con, $_POST["category"]);

    $sql = "UPDATE category SET category = '{$category}' WHERE id = '{$categoryId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
