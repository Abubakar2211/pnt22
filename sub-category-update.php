<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryId = mysqli_real_escape_string($con, $_POST["id"]);
    $category = mysqli_real_escape_string($con, $_POST["category"]); 
    $sub_category = mysqli_real_escape_string($con, $_POST["sub_category"]);

    $sql = "UPDATE sub_category SET category_id = '{$category}', sub_category = '{$sub_category}' WHERE id = '{$categoryId}'";

    if (mysqli_query($con, $sql)) {
        echo 1;  
    } else {
        echo 0;  
    }
}
?>
