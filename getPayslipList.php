<?php require "connect.php";
@session_start();

$sl=1;
$year=$_REQUEST['year'];
$Month=$_REQUEST['Month'];
$_SESSION['selectMonth']=$Month;
$_SESSION['selectYear']=$year;
$sql="SELECT * From payroll Where Salary_Year='$year' && salary_Month='$Month'";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($query)){
    
?>
<tr>
    <td><?php echo $sl++;?></td>
    <td><?php echo $row['employee_id'];?></td>
    <td><?php echo $row['Salary_Year'];?></td>
    <td><?php echo $row['salary_Month'];?></td>
    <td><?php echo $row['salary_Status'];?></td>
    <td><a class="btn btn-primary" href="payslip.php?aid=<?php echo $row['employee_id'];?>">Pay Slip</a></td>
</tr>
<?php }?>
