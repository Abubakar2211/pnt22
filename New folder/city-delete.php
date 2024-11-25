<?php
include "db.php";

$cityId = mysqli_real_escape_string($con, $_POST["id"]);

$sql = "DELETE FROM city WHERE id = '{$cityId}'";
if (mysqli_query($con, $sql)) {
    echo 1;  
} else {
    echo 0;
}
?>
