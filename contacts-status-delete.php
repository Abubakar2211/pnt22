<?php 


include "db.php";
$statusId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM contacts_status WHERE id = {$statusId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

