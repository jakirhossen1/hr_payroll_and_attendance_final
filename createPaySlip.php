<?php require "connect.php";
@session_start();
date_default_timezone_set("Asia/Dhaka");
if(isset($_POST['submit'])){
@$empName=$_POST['empnam'];
@$Year=$_POST['year'];
@$Month=$_POST['dob-month'];
$sqls="SELECT * FROM salary_setup Where employe_Name='$empName'";
    $q=mysqli_query($conn,$sqls);
    $r=mysqli_fetch_array($q);
    @$basicSalary=$r['basic_salary'];
    @$medical=$r['medical'];
    @$houseRent=$r['house_rent'];
    @$food=$r['food'];
    @$provident=$r['provident_fund'];
    @$medicalAmount=($basicSalary*$medical)/100;
    @$houseRentAmount=($basicSalary*$houseRent)/100;
    @$foodAmount=($basicSalary*$food)/100;
    
    @$totalAllownes=($medicalAmount+$houseRentAmount+$foodAmount);
    
    @$providentFund=($basicSalary*$provident)/100;
    
    
    @$workdays = array();
    @$type = CAL_GREGORIAN;
   

@$months = date('n',strtotime($Month)); // Month ID, 1 through to 12.
@$years = date('Y',strtotime($Year)); // Year in 4 digit 2009 format.
@$day_count = cal_days_in_month($type, $months, $years); // Get the amount of days

//loop through all days
for ($i = 1; $i <= $day_count; $i++) {

        $date = $years.'/'.$months.'/'.$i; //format date
        $get_name = date('l', strtotime($date)); //get week day
        $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars

        //if not a weekend add day to array
        if($day_name != 'Fri' && $day_name != 'Sat'){
            $workdays[] = $i;
        }

}
    $count=count($workdays);
    $perDaySalary=round($basicSalary/$count,2);
     @$w="Select MonthName(attendancedate) as mnth,
                                Year(attendancedate) as yar, 
                                COUNT(attendaneStatus)as ct
                                from attendance WHERE attendaneStatus='Absent' && employee_id='$empName' Group BY Month(attendancedate) && Year(attendancedate) HAVING mnth='$Month' AND yar='$Year'";
                            @$x=mysqli_query($conn,$w);
                            @$z=mysqli_fetch_array($x);
    @$absent=$z['ct'];
    @$s="Select MonthName(attendancedate) as mnth,
                            Year(attendancedate) as yar, 
                            COUNT(`lateCountTime`)as ct
                            from attendance WHERE  employee_id='$empName' Group BY Month(attendancedate) && Year(attendancedate)
                            HAVING mnth='$Month' AND yar='$Year'";
                            @$t=mysqli_query($conn,$s);
                            @$u=mysqli_fetch_array($t);
    
  
    @$late=$u['ct'];
    $latecountAbsent=0;
    for($i=0;$i<=$late;$i=$i+3){
        if($i>=3){
            $latecountAbsent++;
        }
    }
    $totalAbsent=$absent+$latecountAbsent;
    $salaryBad=$totalAbsent*$perDaySalary;
    $totalDeduction=$salaryBad+$providentFund;

    $netSalary=$basicSalary+$totalAllownes-$totalDeduction;
    
    $grossSalary=$basicSalary+$totalAllownes+$totalDeduction;
    
}
?>


<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/light-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />

    <title>HR PAYROLL SOFTWARE</title>
    <style>
        .forms-body {
            margin: 10px;
        }
    </style>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <?php require "headers.php" ?>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <?php require "SidebarMenu.php" ?>
        </aside>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

            <!--           Enter Your Code here-->
            <!-- creating paySlip start -->
            <div class="forms-body">
                <form class="form-inline" action="" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 style="margin:10px;">Create Pay Slip</h3>
                                </div>
                                <div class="modal-body  ">
                                    <div class="row">
                                        <div class="col-md-3">


                                            <?php 
    
                                                $sql="SELECT department_Name FROM department";
                                                $query=mysqli_query($conn,$sql);
                                            $rowcount=mysqli_num_rows($query);
                                            ?>
                                            <select class="form-select" name="dep" id="dep" onchange="department()">

                                                <option value="">Select Department</option>

                                                <?php 
                                                    for($i=1;$i<=$rowcount;$i++){
                                                        $row=mysqli_fetch_array($query);
                                                ?>
                                                <option value="<?php echo $row['department_Name'];?>"><?php echo $row['department_Name'];?></option>
                                                <?php
                                                    }
                
                                                    ?>

                                            </select><br>

                                        </div>
                                        <div class="col-md-3">



                                            <select class="form-select selects" data-live-search="true" name="empnam" id="empt">

                                            </select>

                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-select" name="year" id="">
                                                <?php 
                                                for($i=1900;$i<=date("Y");$i++){
                                                
                                                ?>
                                                <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="dob-month" class=" form-select">
                                                <option value="">Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-primary" name="submit" id="" value="Find">
                                        </div>

                                    </div>





                                </div>

                            </div>
                        </div><!-- col-md-12 end -->
                    </div><!-- row end -->

                    <hr>
                    <div class="row">

                        <div class="col-md-3">

                            <?php 
                            if(isset($_POST['submit'])){
                            @$empName=$_POST['empnam'];
                            @$Year=$_POST['year'];
                            @$Month=$_POST['dob-month'];
                            $s="Select MonthName(attendancedate) as mnth,
                            Year(attendancedate) as yar, 
                            COUNT(attendaneStatus)as ct
                            from attendance WHERE attendaneStatus='Present' && employee_id='$empName' Group                         BY Month(attendancedate) && Year(attendancedate) HAVING mnth='$Month' AND                           yar='$Year'";
                            @$t=mysqli_query($conn,$s);
                            @$u=mysqli_fetch_array($t);
                            
                          }  
                        ?>


                            Present Count:<input class="form-control" type="text" name="presentCount" id="" readonly value="<?php echo @$u['ct']; ?>">

                        </div>

                        <div class="col-md-3">
                            <?php 
                            if(isset($_POST['submit'])){
                            @$empName=$_POST['empnam'];
                            @$Year=$_POST['year'];
                            @$Month=$_POST['dob-month'];
                            @$w="Select MonthName(attendancedate) as mnth,
                                Year(attendancedate) as yar, 
                                COUNT(attendaneStatus)as ct
                                from attendance WHERE attendaneStatus='Absent' && employee_id='$empName' Group BY Month(attendancedate) && Year(attendancedate) HAVING mnth='$Month' AND yar='$Year'";
                            @$x=mysqli_query($conn,$w);
                            @$z=mysqli_fetch_array($x);
                            
                          }  
                        ?>
                            Absent Count:<input class="form-control" type="text" name="absentCount" id="" readonly value="<?php echo @$z['ct'];?>">
                        </div>
                        <div class="col-md-3">
                            <?php 
                            if(isset($_POST['submit'])){
                            @$empName=$_POST['empnam'];
                            @$Year=$_POST['year'];
                            @$Month=$_POST['dob-month'];
                            @$h="Select MonthName(attendancedate) as mnth,
                            Year(attendancedate) as yar, 
                            COUNT(attendaneStatus)as ct
                            from attendance WHERE attendaneStatus='On Leave' && employee_id='$empName' Group                         BY Month(attendancedate) && Year(attendancedate) HAVING mnth='$Month' AND                       yar='$Year'";
                            @$i=mysqli_query($conn,$h);
                            @$j=mysqli_fetch_array($i);
                            
                          }  
                        ?>
                            Leave Count:<input class="form-control" type="text" name="leaveCount" id="" readonly value="<?php echo @$j['ct'];?>">
                        </div>
                        <div class="col-md-3">

                            <?php 
                            if(isset($_POST['submit'])){
                            @$empName=$_POST['empnam'];
                            @$Year=$_POST['year'];
                            @$Month=$_POST['dob-month'];
                            $s="Select MonthName(attendancedate) as mnth,
                            Year(attendancedate) as yar, 
                            COUNT(`lateCountTime`)as ct
                            from attendance WHERE  employee_id='$empName' Group BY Month(attendancedate) && Year(attendancedate)
                            HAVING mnth='$Month' AND yar='$Year'";
                            @$t=mysqli_query($conn,$s);
                            @$u=mysqli_fetch_array($t);
                            
                          }  
                        ?>
                            Late Count:<input class="form-control" type="text" name="lateCount" id="" readonly value="<?php echo @$u['ct'];?>">
                        </div>

                    </div>
                </form>
                <hr>

                <form action="" method="post" enctype="multipart/form-data" id="myform">
                   <input type="hidden" name="empnam" id="" value="<?php echo @$empName;?>" >
                   <input type="hidden" name="year" id="" value="<?php echo @$Year;?>">
                   <input type="hidden" name="dob-month" id="" value="<?php echo @$Month;?>" >
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h6 class="modal-title text-primary">Allownes</h6>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>House rent:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="" id="" value="<?php echo @$houseRentAmount;?>" readonly>

                                        </div>

                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Medical Allownes :</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="" id="" value="<?php echo @$medicalAmount;?>" readonly>

                                        </div>

                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Food Allownes:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="" id="" value="<?php echo @$foodAmount;?>" readonly>

                                        </div>

                                    </div><br>



                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 style="margin:10px;" class="modal-title text-primary padding-top">Other Allownes</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="Title" name="title" id="">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="amount" name="amount" id="">
                                        </div>
                                    </div>
                                </div>


                            </div>



                        </div>


                        <div class="col-md-6">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h6 class="modal-title text-primary">Deductions</h6>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Provident Fund:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="" id="" value="<?php echo @$providentFund;?>" readonly>

                                        </div>

                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>By Absent:</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="" id="" value="<?php echo @$salaryBad;?>" readonly>

                                        </div>

                                    </div>



                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 style="margin:10px;" class="modal-title text-primary padding-top">Other Deductions</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="Title" name="title" id="">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="amount" name="amount" id="">
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>



                    <hr>
                    <div class="modal-content">
                        <div class="forms-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 style="margin:10px;">Summary</h3>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">

                                    <input type="text" placeholder="Basic" class="form-control" name="" id="" value="<?php echo @$r['basic_salary'];?>" readonly><br>
                                    <input type="text" placeholder="Total Allowances" class="form-control" name="" readonly value="<?php echo @$totalAllownes;?>"><br>
                                    <input type="text" placeholder="Total Deductions" class="form-control" name="" id="" readonly value="<?php echo @$totalDeduction;?>"><br>
                                    <input type="text" placeholder="Net Salary" class="form-control" name="" id="" value="<?php echo @$netSalary;?>" readonly><br>
                                    <input type="text" placeholder="Gross Salary" class="form-control" name="" id="" readonly value="<?php echo @$grossSalary;?>"><br>
                                    <select class="form-select" name="deductions">
                                        <option class="form-control" value="" selected> Payment Method</option>
                                        <option class="form-control" value="">Bank payment</option>
                                        <option class="form-control" value="">Cash payment</option>
                                    </select>
                                    <span id="errdeductions"></span>
                                    <br>
                                    <select class="form-select" name="salarystatus" id="salarystatus" onkeyup="change(this.id,'errsalarystatus','status')" onblur="change(this.id,'errsalarystatus','status')" >
                                        <option class="form-control" value="" selected>Select Status</option>
                                        <option class="form-control" value="Paid">Paid</option>
                                        <option class="form-control" value="Unpaid">Unpaid</option>
                                        <option class="form-control" value="Pending">Pending</option>
                                        <option class="form-control" value="Processing">Processing</option>
                                    </select>
                                    <span id="errsalarystatus"></span>
                                    <br>


                                </div>

                                <div class="col-md-3"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                               
                               <?php 
                                 if(isset($_POST['submit'])){
                            @$empName=$_POST['empnam'];
                            @$Year=$_POST['year'];
                            @$Month=$_POST['dob-month'];
                                    @$payrollTablescheckSql="Select * from payroll Where employee_id='$empName' && salary_Month='$Month' && Salary_Year='$Year'";
                @$payrollTableCheckQuery=mysqli_query($conn,$payrollTablescheckSql);
                @$payrollcheckResults=mysqli_num_rows($payrollTableCheckQuery);
                                 }
              ?>
                    
                    
                               
                                <input class="btn btn-primary bx-pull-right mb-3" type="submit"<?php if (@$payrollcheckResults == 1){ ?> disabled <?php   } ?> name="CratePaySlip" id="" value="Create PaySlip">
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            
 <script type="text/JavaScript">
   $("#myform").submit(function(){
        var Deductions= $("#deductions").val();
        var Salarystatus= $("#salarystatus").val();
        
        
      if(Deductions==""){
            $("#deductions").attr("style","border: 3px solid red");
            $("#errdeductions").css("color","red");
            $("#errdeductions").html("Please select any payment method");
            return false;
        }else{
            $("#deductions").attr("style","border:");
            $("#errdeductions").html("");
        }
      if(Salarystatus==""){
            $("#salarystatus").attr("style","border: 3px solid red");
            $("#errsalarystatus").css("color","red");
            $("#errsalarystatus").html("Please select any payment status");
            return false;
        }else{
            $("#salarystatus").attr("style","border:");
            $("#errsalarystatus").html("");
        }
    });
    
    function change(id,msg,type=null){
        var get=$("#"+id).val();
        
        if(type==null){
            if(get==""){
            $("#"+id).attr("style","border: 3px solid red");
            $("#"+msg).css("color","red");
            $("#"+msg).html("This field must not be empty!");
            
        }else{
            $("#"+id).attr("style","border:");
            $("#"+msg).html("");
        }
        
        }
        
        if(type=="method"){
            if(get==""){
            $("#"+id).attr("style","border: 3px solid red");
            $("#"+msg).css("color","red");
            $("#"+msg).html("Please select any payment method");
            
        }else{
            $("#"+id).attr("style","border:");
            $("#"+msg).html("");
        }
        
        }
        
        if(type=="status"){
            if(get==""){
            $("#"+id).attr("style","border: 3px solid red");
            $("#"+msg).css("color","red");
            $("#"+msg).html("Please select any payment status");
            
        }else{
            $("#"+id).attr("style","border:");
            $("#"+msg).html("");
        }
        
        }
        
       
     
    }
    
</script>                      
            
            
            
            

            <?php 
            if(isset($_POST['CratePaySlip'])){
                @$empName=$_POST['empnam'];
                @$Year=$_POST['year'];
                @$Month=$_POST['dob-month'];
                $sqls="SELECT * FROM salary_setup Where employe_Name='$empName'";
                $today=date("Y-m-d");
                $salaryStatus=$_POST['salarystatus'];
                
    $q=mysqli_query($conn,$sqls);
    $r=mysqli_fetch_array($q);
    @$basicSalary=$r['basic_salary'];
    @$medical=$r['medical'];
    @$houseRent=$r['house_rent'];
    @$food=$r['food'];
    @$provident=$r['provident_fund'];
    @$medicalAmount=($basicSalary*$medical)/100;
    @$houseRentAmount=($basicSalary*$houseRent)/100;
    @$foodAmount=($basicSalary*$food)/100;
    
    @$totalAllownes=($medicalAmount+$houseRentAmount+$foodAmount);
    
    @$providentFund=($basicSalary*$provident)/100;
    
    
    @$workdays = array();
    @$type = CAL_GREGORIAN;
   

@$months = date('n',strtotime($Month)); // Month ID, 1 through to 12.
@$years = date('Y',strtotime($Year)); // Year in 4 digit 2009 format.
@$day_count = cal_days_in_month($type, $months, $years); // Get the amount of days

//loop through all days
for ($i = 1; $i <= $day_count; $i++) {

        $date = $years.'/'.$months.'/'.$i; //format date
        $get_name = date('l', strtotime($date)); //get week day
        $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars

        //if not a weekend add day to array
        if($day_name != 'Fri' && $day_name != 'Sat'){
            $workdays[] = $i;
        }

}
    $count=count($workdays);
    $perDaySalary=round($basicSalary/$count,2);
     @$w="Select MonthName(attendancedate) as mnth,
                                Year(attendancedate) as yar, 
                                COUNT(attendaneStatus)as ct
                                from attendance WHERE attendaneStatus='Absent' && employee_id='$empName' Group BY Month(attendancedate) && Year(attendancedate) HAVING mnth='$Month' AND yar='$Year'";
                            @$x=mysqli_query($conn,$w);
                            @$z=mysqli_fetch_array($x);
    $absent=$z['ct'];
    $s="Select MonthName(attendancedate) as mnth,
                            Year(attendancedate) as yar, 
                            COUNT(`lateCountTime`)as ct
                            from attendance WHERE  employee_id='$empName' Group BY Month(attendancedate) && Year(attendancedate)
                            HAVING mnth='$Month' AND yar='$Year'";
                            @$t=mysqli_query($conn,$s);
                            @$u=mysqli_fetch_array($t);
    
  
    $late=$u['ct'];
                 @$h="Select MonthName(attendancedate) as mnth,
                            Year(attendancedate) as yar, 
                            COUNT(attendaneStatus)as ct
                            from attendance WHERE attendaneStatus='On Leave' && employee_id='$empName' Group                         BY Month(attendancedate) && Year(attendancedate) HAVING mnth='$Month' AND                       yar='$Year'";
                            @$i=mysqli_query($conn,$h);
                            @$j=mysqli_fetch_array($i);
                @$leave=$j['ct'];
                
                $s="Select MonthName(attendancedate) as mnth,
                            Year(attendancedate) as yar, 
                            COUNT(attendaneStatus)as ct
                            from attendance WHERE attendaneStatus='Present' && employee_id='$empName' Group                         BY Month(attendancedate) && Year(attendancedate) HAVING mnth='$Month' AND                           yar='$Year'";
                            @$t=mysqli_query($conn,$s);
                            @$uS=mysqli_fetch_array($t);
                $present=$uS['ct'];
                
    $latecountAbsent=0;
    for($i=0;$i<=$late;$i=$i+3){
        if($i>=3){
            $latecountAbsent++;
        }
    }
    $totalAbsent=$absent+$latecountAbsent;
    $salaryBad=$totalAbsent*$perDaySalary;
    $totalDeduction=$salaryBad+$providentFund;

    $netSalary=$basicSalary+$totalAllownes-$totalDeduction;
    
    $grossSalary=$basicSalary+$totalAllownes+$totalDeduction;
                
$payrollTablescheckSql="Select * from payroll Where employee_id='$empName' && salary_Month='$Month' && Salary_Year='$Year'";
                $payrollTableCheckQuery=mysqli_query($conn,$payrollTablescheckSql);
                $payrollcheckResults=mysqli_num_rows($payrollTableCheckQuery);
                if($payrollcheckResults==1){
                    echo "<script>alert('Payroll Slip Already Exits')</script>";
                }else{
                    $payrollInsert="INSERT INTO `payroll` (`employee_id`, `salary_id`, `addition_id`, `deduction_id`, `salary_Date`, `salary_Month`, `total_Attendance`, `total_Absent`, `total_Leave`, `total_Leave_withoutpay`, `salary_Status`, `Salary_Year`) VALUES ('$empName', '$empName', '$empName', '$empName', '$today', '$Month', '$present', '$totalAbsent', '$leave', NULL, '$salaryStatus', '$Year')";
                    $payrollInsertQuery=mysqli_query($conn,$payrollInsert);
                    
                    echo "<script>alert('Create Payroll Slip Successfully ')</script>";
                }
                
                $salaryTablescheckSql="Select * from salary Where employe_id='$empName' && salary_Month='$Month' && salary_year='$Year'";
                $salaryTableCheckQuery=mysqli_query($conn,$salaryTablescheckSql);
                $salarycheckResults=mysqli_num_rows($salaryTableCheckQuery);
                if($salarycheckResults==1){
                    
                }else{
                    $salaryInsert="INSERT INTO `salary` (`salary_type_id`, `employe_id`, `basic_salary`, `medical`, `house_rent`, `food`, `provident_fund`, `net_salary`, `gross_salary`, `salary_date`,`salary_year`, `salary_Month`) VALUES (NULL,'$empName','$basicSalary', '$medicalAmount', '$houseRentAmount', '$foodAmount', '$providentFund', '$netSalary', '$grossSalary', '$today','$Year','$Month')";
                    $salayQuery=mysqli_query($conn,$salaryInsert);
                }
                 $additionTablescheckSql="Select * from addition Where employee_id='$empName' && month='$Month' && addition_year='$Year'";
                $additionTableCheckQuery=mysqli_query($conn,$additionTablescheckSql);
                $additoncheckResults=mysqli_num_rows($additionTableCheckQuery);
                if($additoncheckResults==1){
                    
                }else{
                   $additionInsert= "INSERT INTO `addition` (`employee_id`, `addition_code`, `description`, `amount`, `month`, `addition_year`, `addition_status`) VALUES ('$empName', NULL, NULL, '$providentFund','$Month','$Year','$salaryStatus')";
                    $additionQuery=mysqli_query($conn,$additionInsert);
                }
                
                
                 $deductionTablescheckSql="Select * from deduction Where employee_id='$empName' && month='$Month' && deduction_year='$Year'";
               $deductionTableCheckQuery=mysqli_query($conn,$deductionTablescheckSql);
                $deductioncheckResults=mysqli_num_rows($deductionTableCheckQuery);
                if($deductioncheckResults==1){
                    
                }else{
                 $dedcutionInsert="INSERT INTO `deduction` (`employee_id`, `deduction_code`, `description`, `amount`, `month`, `deduction_year`, `deduction_status`) VALUES ('$empName', NULL, NULL, '$salaryBad', '$Month', '$Year', '$salaryStatus')";
                    $deductionQury=mysqli_query($conn,$dedcutionInsert);
                }
                
            }
            
            
            ?>




            <!-- creating paySlip end -->>









        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
    <script src="assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <!--app-->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/index.js"></script>

    <script>
        new PerfectScrollbar(".best-product")
        new PerfectScrollbar(".top-sellers-list")
    </script>

    <script type="text/javascript">
        $("#addnew").click(function() {
            var add = '<div class="row"><div class="col-md-5"><select class="form-control" name="deductions" id=""><option value="" selected> Select Allownes</option><option value=""> Home Allownes</option><option value=""> Medical Allownes</option><option value=""> Rent Allownes</option></select></div><div class="col-md-5"><input class="form-control" type="text" name="" id=""></div><div class="col-md-2"><p class="btn btn-primary remove">-</p></div></div>';

            $(".addmores_div").append(add);

            $(".remove").on("click", function() {
                $(this).parent(".row").remove();
            });

        });
    </script>
    <script>
        function department() {
            var departmentName = $('#dep').val();
            //            console.log(departmentName);
            $.ajax({
                url: 'payrollEmployeSelectAjax.php',
                method: 'POST',
                dataType: 'html',
                data: {
                    departmentName: departmentName
                },
                success: function(data) {
                    $('#empt').html(data);

                }



            });
        }
    </script>



</body>

</html>