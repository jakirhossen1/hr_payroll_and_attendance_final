<?php 

require "connect.php";
  date_default_timezone_set("Asia/Dhaka");
  @session_start();
  if (!isset($_SESSION['userName']))
  {
      header("location:Login.php");
  }
  
if(isset($_POST['submit'])){
    $employee=$_POST['employee'];
    $Deductioncode=$_POST['Deductioncode'];
    $Description=$_POST['Description'];
    $Amount=$_POST['Amount'];
    $month=$_POST['month'];
    $year=$_POST['year'];
    $Status="Pending";    

    $s="SELECT deduction_code FROM deduction WHERE deduction_code='$Deductioncode'";
    $qurey=mysqli_query($conn,$s);
    $num=mysqli_num_rows($qurey);
    if($num==1){
        echo "Deduction Already Exits";
    }else{
        $sql="INSERT INTO `deduction` (`employee_id`, `deduction_code`, `description`, `amount`, `month`, `deduction_year`, `deduction_status`) VALUES ('$employee', '$Deductioncode', '$Description', '$Amount', '$month', '$year', '$Status')";
        $qurey=mysqli_query($conn,$sql);
        echo "Deduction Completed!";
        header("location:managededuction.php");
    }   
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

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>HR PAYROLL SOFTWARE</title>
  <style>
    
    
      .forms-body{
          margin: 10px;
      }
    </style>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">        
       <?php require "headers.php"?>
      </header>
       <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
          <?php require "SidebarMenu.php"?>
       </aside>
       <!--end sidebar -->

       <!--start content-->
          <main class="page-content">
              
<!--           Enter Your Code here-->
    <div class="modal-content">
<div class="forms-body">
    <form action="" method="post" enctype="multipart/form-data" id="myform">
       
       <div class="row">
           <div class="col-md-12">
               <h3 style="margin:10px;">Deduction</h3>
           </div>
       </div>
       <hr>
       
       <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
         
           <?php 
    
             $sql="SELECT employee_name FROM employee";
             $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
            <select class="form-select" name="employee" id="employee" onkeyup="change(this.id,'erremployee')" onblur="change(this.id,'erremployee')" >
                
                
                <option value="">Select Employee</option>
                
                <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                    <option value="<?php echo $row['employee_name'];?>"><?php echo $row['employee_name'];?></option>
                    <?php
                }
                
                ?>
                
            </select>
            <span id="erremployee"></span>
            
          <input class="form-control mt-3" type="number" name="Deductioncode" id="Deductioncode" placeholder="Deduction Code" onkeyup="change(this.id,'errDeductioncode')" onblur="change(this.id,'errDeductioncode')" >
          <span id="errDeductioncode"></span>
          <textarea class="form-control mt-3" name="Description" id="Description" placeholder="Description" onkeyup="change(this.id,'errDescription')" onblur="change(this.id,'errDescription')"></textarea>
          <span id="errDescription"></span>
          <input class="form-control mt-3" type="number" name="Amount" id="Amount" placeholder="Amount" onkeyup="change(this.id,'errAmount')" onblur="change(this.id,'errAmount')" >
          <span id="errAmount"></span>

          <div class="row">
            <div class="col-md-12">
              <div class="row">
              <div class="col-md-6">
                <select class="form-select mt-3" name="month" id="month" onkeyup="change(this.id,'errmonth')" onblur="change(this.id,'errmonth')" >
                    
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
                  <span id="errmonth"></span>
              </div>
              <div class="col-md-6">
                <select class="form-select mt-3" name="year" id="year" onkeyup="change(this.id,'erryear')" onblur="change(this.id,'erryear')" >
                    
                  <option value="">Select Year</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                  
                </select> 
                  <span id="erryear"></span>
              </div>             
            </div>
            </div>
            
          </div>
          <select class="form-select mt-3" name="Status" id="Status" onkeyup="change(this.id,'errStatus')" onblur="change(this.id,'errStatus')" hidden>
              
            <option value="">Status</option>
            <!-- <option value="Aproved">Aproved</option> -->
            <option value="Pending">Pending</option>

          </select>
          <span id="errStatus"></span>
          
          <input type="submit" class="btn btn-primary mt-3 bx-pull-right" name="submit" id="" value="Save">

        </div>
        <div class="col-md-3"></div>
          
       </div>
        
    </form>
    </div>
    </div>


<script type="text/JavaScript">
   $("#myform").submit(function(){
        var Employee= $("#employee").val();
        var Deductioncodes= $("#Deductioncode").val();
        var Descriptions= $("#Description").val();
        var Amounts= $("#Amount").val();
        var Month= $("#month").val();
        var Year= $("#year").val();
        var Statuss= $("#Status").val();
        
      if(Employee==""){
            $("#employee").attr("style","border: 3px solid red");
            $("#erremployee").css("color","red");
            $("#erremployee").html("Please select any employee");
            return false;
        }else{
            $("#employee").attr("style","border:");
            $("#erremployee").html("");
        }
      if(Deductioncodes==""){
            $("#Deductioncode").attr("style","border: 3px solid red");
            $("#errDeductioncode").css("color","red");
            $("#errDeductioncode").html("Please enter your deduction code");
            return false;
        }else{
            $("#Deductioncode").attr("style","border:");
            $("#errDeductioncode").html("");
        }
      if(Descriptions==""){
            $("#Description").attr("style","border: 3px solid red");
            $("#errDescription").css("color","red");
            $("#errDescription").html("Please write deduction message");
            return false;
        }
       else{
           $("#Description").attr("style","border:");
           $("#errDescription").html("");
       }
      if(Amounts==""){
            $("#Amount").attr("style","border: 3px solid red");
            $("#errAmount").css("color","red");
            $("#errAmount").html("Please write your deduction amount");
            return false;
        }
        else{
            $("#Amount").attr("style","border:");
            $("#errAmount").html("");
        }
     if(Month==""){
            $("#month").attr("style","border: 3px solid red");
            $("#errmonth").css("color","red");
            $("#errmonth").html("Please select your deduction month");
            return false;
        }else{
            $("#month").attr("style","border:");
            $("#errmonth").html("");
        }
      if(Year==""){
            $("#year").attr("style","border: 3px solid red");
            $("#erryear").css("color","red");
            $("#erryear").html("Please select your deduction year");
            return false;
        }else{
            $("#year").attr("style","border:");
            $("#erryear").html("");
        }
      if(Statuss==""){
            $("#Status").attr("style","border: 3px solid red");
            $("#errStatus").css("color","red");
            $("#errStatus").html("Please select your status");
            return false;
        }
       else{
           $("#Status").attr("style","border:");
           $("#errStatus").html("");
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
        
       
     
    }
    
</script>           
           
           
           
           
           
            
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
  <!--app-->
  <script src="assets/js/app.js"></script>
  <script src="assets/js/index.js"></script>

  <script>
     new PerfectScrollbar(".best-product")
     new PerfectScrollbar(".top-sellers-list")
  </script>

</body>

</html>