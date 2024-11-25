<?php 


include "db.php";
$teamId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM teams WHERE id = {$teamId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

