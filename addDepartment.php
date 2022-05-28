<?php require "connect.php";
date_default_timezone_set("Asia/Dhaka");
session_start();
if(!isset($_SESSION['userName'])){
  header("location:Login.php");  
}

if(isset($_POST['submit'])){
    $department=$_POST['department'];
    $degination=$_POST['degination'];
    $s="SELECT * FROM department WHERE department_Name='$department'";
    $result=mysqli_query($conn,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "<script> alert('Department Already Exits')</script>";
    }else{
       $sqls="INSERT INTO department(department_Name)Values('$department')";
    $sql="INSERT INTO designation(designation)Values('$degination')";
    $query=mysqli_query($conn,$sqls);
    $query=mysqli_query($conn,$sql);  
    header("location:departmentManage.php");
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
               <h3 style="margin:10px;">Add Department</h3>
           </div>
       </div>
       <hr>
       
      <div class="row">
        <div class="col-md-4">
          <div class="col">
            <input type="text" name="department" id="department" class="form-control" placeholder="Department" onkeyup="change(this.id,'errdepartment')" onblur="change(this.id,'errdepartment')" >
            <span id="errdepartment"></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col">
            <input type="text" name="degination" id="degination" class="form-control" placeholder="Designation" onkeyup="change(this.id,'errdegination')" onblur="change(this.id,'errdegination')" >
            <span id="errdegination"></span>
          </div>
        </div>
        <div class="col-md-4">
            <input type="submit" name="submit" class="btn btn-primary" value="Save">
        </div>
               
           
           
      </div>
        
    </form>
    </div>
    </div>


<script type="text/JavaScript">
   $("#myform").submit(function(){
        var Department= $("#department").val();
        var Degination= $("#degination").val();
        
        
        if(Department==""){
            $("#department").attr("style","border: 3px solid red");
            $("#errdepartment").css("color","red");
            $("#errdepartment").html("Please write your department name");
            return false;
        }else{
            $("#department").attr("style","border:");
            $("#errdepartment").html("");
        }
      if(Degination==""){
            $("#degination").attr("style","border: 3px solid red");
            $("#errdegination").css("color","red");
            $("#errdegination").html("Please write your designation name");
            return false;
        }
       else{
           $("#degination").attr("style","border:");
           $("#errdegination").html("");
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