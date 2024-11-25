<?php 

include "db.php";
$countryId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM country WHERE id = {$countryId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

