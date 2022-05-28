<?php 
require "connect.php";
$suggestion=$_REQUEST['term'];
$sql="select * from districts where name LIKE '$suggestion%'";

$query=mysqli_query($conn,$sql);

;
while($row=mysqli_fetch_array($query)){
$data[]=$row['name'];    
}
echo json_encode($data);
?>