<option value="">Select Employee</option>
<?php 
require "connect.php";
$department=$_REQUEST['departmentName'];

$sqls="SELECT employee_name FROM employee where department_id='$department'";
$querys=mysqli_query($conn,$sqls);
$rowcounts=mysqli_num_rows($querys);

?>



<?php 
for($i=1;$i<=$rowcounts;$i++){
                                                    
$rows=mysqli_fetch_array($querys);
?>

<option value="<?php echo $rows['employee_name'];?>" data-tokens="<?php echo $rows['employee_name'];?>"><?php echo $rows['employee_name'];?></option>
<?php } ?>

                                            
