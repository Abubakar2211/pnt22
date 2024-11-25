<?php 

include "db.php";
$categoryId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM category WHERE id = {$categoryId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

