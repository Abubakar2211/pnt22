<?php 


include "db.php";
$contactId = mysqli_real_escape_string($con,$_POST["id"]);

$sql = "DELETE FROM contacts WHERE id = {$contactId}";
if(mysqli_query($con,$sql)){
 echo 1;
}else{
echo 0;
}

?>

