<?php 


include "db.php";
$sub_categoryId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM sub_category WHERE id = {$sub_categoryId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

