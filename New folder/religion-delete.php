<?php 

include "db.php";
$religionId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM religion WHERE id = {$religionId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

