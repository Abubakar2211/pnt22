<?php 

include "db.php";
$supplierId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM suppliers WHERE id = {$supplierId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

