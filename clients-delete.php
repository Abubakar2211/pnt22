<?php 


include "db.php";
$clientId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM clients WHERE id = {$clientId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

