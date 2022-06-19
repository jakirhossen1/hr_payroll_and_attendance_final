<?php require "connect.php";
date_default_timezone_set("Asia/Dhaka");
session_start();
if(!isset($_SESSION['userName'])){
  header("location:Login.php");  
}


  // print_r("<pre>");
  // print_r($_SESSION);die();
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
      <?php echo include("SidebarMenu.php") ?>
    </aside>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">

      <?php
        $alert = [];
      if (isset($_POST['submit'])) {
        
        $select_employee = $_POST['select_employee'];
        $leave_type = $_POST['leave_type'];
        $leave_start_date = $_POST['leave_start_date'];
        $leave_ends_date = $_POST['leave_ends_date'];
        $description = $_POST['description'];
        $support_document = $_POST['support_document'];
        $leave_status = "pending";

        $sql = "INSERT INTO leaves ( leave_type_id,employee_id,leave_start_date, leave_end_date, leave_for, supported_document, leave_status) VALUES ('$leave_type','$select_employee','$leave_start_date', '$leave_ends_date', '$description', '$support_document', '$leave_status')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
          $alert['success'] = 'Your leave document added successfully';
        } else {
          $alert['errors'] = 'Your leave document is not added';
        }
      }

        if($alert) {

          if(isset($alert['success'])) {
      ?>
        <div class="alert alert-success">
          <?php echo $alert['success'] ;?>
        </div>
      <?php }?>
        <?php 
          if(isset($alert['errors'])) {
        ?>
        <div class="alert alert-success">
          <?php echo $alert['errors'] ;?>
        </div>
      <?php }}?>
      <!--           Enter Your Code here-->
      <div class="modal-content">
        <div class="forms-body">
          <form action="" method="post" enctype="multipart/form-data" id="myform">
            <div class="row">
              <div class="col-md-12">
                <h3 style="margin:10px;">Apply Leave</h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <?php if($_SESSION['role']['role_name'] == "Admin"): ?>
                  <div class="form-group">
                    <label>Users</label>
                    <?php
                      $sql = "SELECT * FROM user_table WHERE `email` != '".$_SESSION['userName']."'";
                      $query = mysqli_query($conn, $sql);
                      $rowcount = mysqli_num_rows($query);
                    ?>
                    <select class="form-select" name="select_employee" id="select_employee" onkeyup="change(this.id,'errleave_type')" onblur="change(this.id,'errleave_type')" >
                         

                      <option value="">Select user</option>

                      <?php
                      for ($i = 1; $i <= $rowcount; $i++) {
                        $row = mysqli_fetch_array($query);
                      ?>
                        <option value="<?php echo $row['user_name']; ?>"><?php echo $row['user_name'] ." (". $row['email'] .")"; ?></option>
                      <?php
                      }

                      ?>
                    </select>
                  </div>
                <?php endif ?>

                <div class="form-group">
                  <label>Leave Type</label>
                  <?php

                  $sql = "SELECT leave_type FROM leave_type";
                  $query = mysqli_query($conn, $sql);
                  $rowcount = mysqli_num_rows($query);
                  ?>
                  <select class="form-select" name="leave_type" id="leave_type" onkeyup="change(this.id,'errleave_type')" onblur="change(this.id,'errleave_type')" >
                       

                    <option value="">Select Leave Type</option>

                    <?php
                    for ($i = 1; $i <= $rowcount; $i++) {
                      $row = mysqli_fetch_array($query);
                    ?>
                      <option value="<?php echo $row['leave_type']; ?>"><?php echo $row['leave_type']; ?></option>
                    <?php
                    }

                    ?>

                  </select>
                    <span id="errleave_type"></span>
                </div>

                <div class="form-group">
                  Leave Start Date
                  <input class="form-control mt-1 mb-1 " name="leave_start_date" id="leave_start_date" type="date" onkeyup="change(this.id,'errleave_start_date')" onblur="change(this.id,'errleave_start_date')" >
                   <span id="errleave_start_date"></span>
                </div>
                <div class="form-group">
                  Leave Ends Date
                  <input class="form-control mt-1  " name="leave_ends_date" id="leave_ends_date" type="date" onkeyup="change(this.id,'errleave_ends_date')" onblur="change(this.id,'errleave_ends_date')" >
                   <span id="errleave_ends_date"></span>
                </div>
                <div class="form-group">
                  <textarea class="form-control mt-3" name="description" id="description" cols="10" rows="2" placeholder="Please enter your message" onkeyup="change(this.id,'errdescription')" onblur="change(this.id,'errdescription')" ></textarea><br>
                   <span id="errdescription"></span>
                </div>
                <div class="form-group">
                  <?php

                  $sql = "SELECT document_Name FROM employee_document";
                  $query = mysqli_query($conn, $sql);
                  $rowcount = mysqli_num_rows($query);
                  ?>
                  <select class="form-select" name="support_document" id="support_document" onkeyup="change(this.id,'errsupport_document')" onblur="change(this.id,'errsupport_document')" >
                       

                    <option value="">Select Support Document</option>

                    <?php
                    for ($i = 1; $i <= $rowcount; $i++) {
                      $row = mysqli_fetch_array($query);
                    ?>
                      <option value="<?php echo $row['document_Name']; ?>"><?php echo $row['document_Name']; ?></option>
                    <?php
                    }

                    ?>
                  </select>
                    <span id="errsupport_document"></span>
                </div>

                <div class="form-group">
                  <label class="label">Status</label>
                  <select class="form-select" >
                    <option value="">Pending</option>
                  </select>
                    <span id="errsupport_document"></span>
                </div>

                <div class="form-group">
                  <input class="btn btn-primary bx-pull-right mt-3" type="submit" name="submit" value="Apply">
                </div>
              </div>
              <div class="col-md-3"></div>
            </div>
          </form>
        </div>
      </div>


 
      
      <!--  php insert code-->>

      







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
    // new PerfectScrollbar(".best-product")
    // new PerfectScrollbar(".top-sellers-list")
  </script>

  <script type="text/JavaScript">
   $("#myform").submit(function(){
        var Select_employee= $("#select_employee").val();
        var Leave_type= $("#leave_type").val();
        var Leave_start_date= $("#leave_start_date").val();
        var Leave_ends_date= $("#leave_ends_date").val();
        var Description= $("#description").val();
        var Support_document= $("#support_document").val();
        
      if(Select_employee==""){
            $("#select_employee").attr("style","border: 3px solid red");
            $("#errselect_employee").css("color","red");
            $("#errselect_employee").html("Please select employee name");
            return false;
        }else{
            $("#select_employee").attr("style","border:");
            $("#errselect_employee").html("");
        }
      if(Leave_type==""){
            $("#leave_type").attr("style","border: 3px solid red");
            $("#errleave_type").css("color","red");
            $("#errleave_type").html("Please select your leave type");
            return false;
        }else{
            $("#leave_type").attr("style","border:");
            $("#errleave_type").html("");
        }
      if(Leave_start_date==""){
            $("#leave_start_date").attr("style","border: 3px solid red");
            $("#errleave_start_date").css("color","red");
            $("#errleave_start_date").html("Please select leave start date");
            return false;
        }
       else{
           $("#leave_start_date").attr("style","border:");
           $("#errleave_start_date").html("");
       }
      if(Leave_ends_date==""){
            $("#leave_ends_date").attr("style","border: 3px solid red");
            $("#errleave_ends_date").css("color","red");
            $("#errleave_ends_date").html("Please select leave end date");
            return false;
        }
        else{
            $("#leave_ends_date").attr("style","border:");
            $("#errleave_ends_date").html("");
        }
     if(Description==""){
            $("#description").attr("style","border: 3px solid red");
            $("#errdescription").css("color","red");
            $("#errdescription").html("Please enter your leave message");
            return false;
        }else{
            $("#description").attr("style","border:");
            $("#errdescription").html("");
        }
      if(Support_document==""){
            $("#support_document").attr("style","border: 3px solid red");
            $("#errsupport_document").css("color","red");
            $("#errsupport_document").html("Please select your support document");
            return false;
        }else{
            $("#support_document").attr("style","border:");
            $("#errsupport_document").html("");
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
</body>

</html>