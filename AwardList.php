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
    $awarddate=$_POST['awarddate'];
    $EmployeeName=$_POST['EmployeeName'];
    $AwardAmount=$_POST['AwardAmount'];
    $leaves_status=$_POST['leaves_status'];
    $Description=$_POST['Description'];
    $dates=$_POST['dates'];
     

    $s="SELECT award_date FROM award_list WHERE award_date='$awarddate'";
    $qurey=mysqli_query($conn,$s);
    $num=mysqli_num_rows($qurey);
    if($num==1){
        echo "Award Already Exits";
    }else{
        $sql="INSERT INTO `award_list` (`employee_id`, `award_date`, `award_of_name`, `total_amount`, `leave_status`, `description`, `month_year`) VALUES ('$employee', '$awarddate', '$EmployeeName', '$AwardAmount', '$leaves_status', '$Description', '$dates')";
        $qurey=mysqli_query($conn,$sql);
        echo "Award Added!";
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
               <h3 style="margin:10px;">Add Award List</h3>
           </div>
       </div>
       <hr>
       
       <div class="row">
           <div class="col-md-3">
               
           </div>
           <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
    
                           $sql="SELECT employee_name FROM employee";
                           $query=mysqli_query($conn,$sql);
                            $rowcount=mysqli_num_rows($query);
                            ?>
                            <select class="form-select" name="employee" id="employee" onkeyup="change(this.id,'erremployee','data')" onblur="change(this.id,'erremployee','data')" >
                                

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
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                       Award Date<input type="date" class="form-control mt-1 mb-3" name="awarddate" id="awarddate" onkeyup="change(this.id,'errawarddate')" onblur="change(this.id,'errawarddate')" >
                       <span id="errawarddate"></span>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                       <input type="text" class="form-control mt-3 mb-3" name="EmployeeName" id="EmployeeName" placeholder="Award Name" onkeyup="change(this.id,'errEmployeeName')" onblur="change(this.id,'errEmployeeName')" >
                       <span id="errEmployeeName"></span>
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" class="form-control mt-3 mb-3" name="AwardAmount" id="AwardAmount" placeholder="Award Amount" onkeyup="change(this.id,'errAwardAmount')" onblur="change(this.id,'errAwardAmount')" >
                        <span id="errAwardAmount"></span>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="Description" rows="3" id="Description" placeholder="Description" class="form-control mt-3 mb-3" onkeyup="change(this.id,'errDescription')" onblur="change(this.id,'errDescription')" ></textarea>
                        <span id="errDescription"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="date" class="form-control mt-3 mb-3" name="dates" id="dates" onkeyup="change(this.id,'errdates')" onblur="change(this.id,'errdates')">
                        <span id="errdates"></span>
                    </div>
                </div>

                <div class="row">
                     <div class="col-md-12">
                         <input class="btn btn-primary mt-3 mb-3 bx-pull-right " type="submit" name="submit" id="" value="Save">
                     </div>
                </div>
           </div>
           <div class="col-md-3">
               
           </div>
       </div>
        
    </form>
    </div>
    </div>

<script type="text/JavaScript">
   $("#myform").submit(function(){
        var Employee= $("#employee").val();
        var Awarddate= $("#awarddate").val();
        var EmployeeNames= $("#EmployeeName").val();
        var AwardAmounts= $("#AwardAmount").val();
        var Descriptions= $("#Description").val();
        var Dates= $("#dates").val();
        
        if(Employee==""){
            $("#employee").attr("style","border: 3px solid red");
            $("#erremployee").css("color","red");
            $("#erremployee").html("Please select any employee");
            return false;
        }else{
            $("#employee").attr("style","border:");
            $("#erremployee").html("");
        }
      if(Awarddate==""){
            $("#awarddate").attr("style","border: 3px solid red");
            $("#errawarddate").css("color","red");
            $("#errawarddate").html("Please select award date");
            return false;
        }
       else{
           $("#awarddate").attr("style","border:");
           $("#errawarddate").html("");
       }
      if(EmployeeNames==""){
            $("#EmployeeName").attr("style","border: 3px solid red");
            $("#errEmployeeName").css("color","red");
            $("#errEmployeeName").html("Please write award name");
            return false;
        }
        else{
            $("#EmployeeName").attr("style","border:");
            $("#errEmployeeName").html("");
        }
        if(AwardAmounts==""){
            $("#AwardAmount").attr("style","border: 3px solid red");
            $("#errAwardAmount").css("color","red");
            $("#errAwardAmount").html("Please write your award amount");
            return false;
        }else{
            $("#AwardAmount").attr("style","border:");
            $("#errAwardAmount").html("");
        }
      if(Descriptions==""){
            $("#Description").attr("style","border: 3px solid red");
            $("#errDescription").css("color","red");
            $("#errDescription").html("Please write your award message");
            return false;
        }
       else{
           $("#Description").attr("style","border:");
           $("#errDescription").html("");
       }
      if(Dates==""){
            $("#dates").attr("style","border: 3px solid red");
            $("#errdates").css("color","red");
            $("#errdates").html("Please select your award date");
            return false;
        }
        else{
            $("#Serial").attr("style","border:");
            $("#errSerial").html("");
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
        if(type=="data"){
            if(get==""){
            $("#"+id).attr("style","border: 3px solid red");
            $("#"+msg).css("color","red");
            $("#"+msg).html("Please select any option");
            
        }
        else{
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