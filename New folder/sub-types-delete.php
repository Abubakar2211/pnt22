<?php 


include "db.php";
$typeId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM sub_types WHERE id = {$typeId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

