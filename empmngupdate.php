<?php
    require 'connect.php';

    date_default_timezone_set("Asia/Dhaka");
    @session_start();
    if (!isset($_SESSION['userName']))
    {
        header("location:Login.php");
    }
?>

<?php require "connect.php";?>
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
      <?php require "SidebarMenu.php" ?>
    </aside>
    <!--end sidebar -->
    <!--start content-->
    <main class="page-content">

      <!--Enter Your Code here-->

      <div class="forms-body">
          
          
        <?php

                $Id=$_GET['aid'];
                $sql="SELECT * FROM employee WHERE employee_id='$Id';";
                $query= mysqli_query($conn,$sql);
                $num= mysqli_fetch_array($query)


        ?>
        <form action="empmngupdatedetails.php" method="post" enctype="multipart/form-data">

          <div class="row">
            <div class="col-md-12">
              <h3  style="margin:10px;">Update Employee</h3>
            </div>
          </div>
          <hr>
          <div class="row">
            <!-- personal information Start -->
            <div class="col-md-6">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-info">Personal information</h4>
                </div>

                <div class="modal-body">
                   <input type="hidden" name="Id" value="<?php echo $num['0'];?>" >
                  <input class="form-control" type="text" name="employ_name" value="<?php echo $num['employee_name'];?>"><br>
                  
                <select class="form-control" name="gen" >
                    <option value="<?php echo $num['gender'];?>"><?php echo $num['gender'];?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br>

                  <label class="form-control" for="marital_status">Marital Status: <select class="form-control" name="marital_status" value="">
                      <option value="<?php echo $num['maritial_Status'];?>"><?php echo $num['maritial_Status'];?></option>
                      <option value="married">Married</option>
                      <option value="unmarried">Unmarried</option>
                    </select> </label><br>
                  <label class="form-control" for="">Birth Date: <input class="form-control" type="date" name="employ_date_of_birth" value="<?php echo $num['date_of_birth'];?>"></label><br>
                  <label class="form-control" for="">Photo: <input class="form-control" type="file" name="employmet_picture" value="<?php echo $num['picture'];?>"> </label><br>
                  <input class="form-control" type="text" name="employ_religion" value="<?php echo $num['religion'];?>"><br>
                  <input class="form-control" type="text" name="employ_district" value="<?php echo $num['district'];?>"><br>
                  <input class="form-control" type="text" name="employ_countris" value="<?php echo $num['Countries'];?>"><br>
                  <input class="form-control" type="text" name="phone" value="<?php echo $num['phone'];?>"><br>
                  <input class="form-control" type="text" name="employ_postal_code" value="<?php echo $num['postal_code'];?>"><br>
                  <input class="form-control" type="text" name="employ_nationality" value="<?php echo $num['nationality'];?>"><br>
                  <input class="form-control" type="text" name="present_address" value="<?php echo $num['present_address'];?>" ><br>
                  <input class="form-control" type="text" name="permanent_address" value="<?php echo $num['permanent_address'];?>" ><br>
                  <input class="form-control" type="text" name="employ_nid" value="<?php echo $num['Passport_or_NID'];?>"><br>
                  <select class="form-control" name="employment_status" value="" >
                      <option value="<?php echo $num['employee_status'];?>"><?php echo $num['employee_status'];?></option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                  </select>
                  <br>
                </div>
                
              </div>

            </div>
            <!-- personal information End -->
            <?php
                $Id=$_GET['aid'];
                $sql="SELECT * FROM user_table WHERE user_id='$Id';";
                $query= mysqli_query($conn,$sql);
                while ($row= mysqli_fetch_array($query)){
            
            ?>
            <div class="col-md-6">
              <!-- Login information Start -->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-info">Login Information</h4>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" value="<?php echo $row['0'];?>" >
                  <input class="form-control" type="text" name="employeeemail" value="<?php echo $num['email'];?>"><br>
                  <input class="form-control" type="password" name="employeepass" value="<?php echo $row['password'];?>">
                </div>
              </div>
                <?php }?>
              <hr>
              <!-- Login information  End-->
              <!-- Company information Start-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-info" >Company Details</h4>
                </div>
                <div class="modal-body">
                       <?php 
    
                                                $sql="SELECT employee_type FROM employee_type";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
            <select class="form-control" name="employment_id" >
                
                <option value="<?php echo $num['employee_type_id'];?>"><?php echo $num['employee_type_id'];?></option>
                
                <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                    <option value="<?php echo $row['employee_type'];?>"><?php echo $row['employee_type'];?></option>
                    <?php
                }
                
                ?>
                
            </select><br>
               <?php 
    
                                                $sql="SELECT department_Name FROM department";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
            <select class="form-control" name="department_id" >
                
                <option value="<?php echo $num['department_id'];?>"><?php echo $num['department_id'];?></option>
                
                <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                    <option value="<?php echo $row['department_Name'];?>"><?php echo $row['department_Name'];?></option>
                    <?php
                }
                
                ?>
                
            </select><br>
            
                                 <?php 
    
                                                $sql="SELECT designation FROM designation";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
            <select class="form-control" name="designation" >
                
                <option value="<?php echo $num['designation_id'];?>"><?php echo $num['designation_id'];?></option>
                
                <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                    <option value="<?php echo $row['designation'];?>"><?php echo $row['designation'];?></option>
                    <?php
                }
                
                ?>
                
            </select><br>
                  <label class="form-control" for="">Appointment Date: <input class="form-control" type="date"name="appointment_date" value="<?php echo $num['appointment_date'];?>"></label><br>
                  <label class="form-control" for="">Joining Date: <input class="form-control" type="date"name="joining_date" value="<?php echo $num['joining_date'];?>" ></label><br>
                  <input class="form-control" type="text" name="employee_code" value="<?php echo $num['employee_code'];?>"><br>
                  <input class="form-control" type="text" name="created_by" value="<?php echo $num['created_by'];?>"><br>

                </div>
                <div class="modal-footer">
                <input class="btn btn-primary" type="submit" name="update"  value="Update">
                </div>
              </div>
              <!-- Company information End -->
            </div>
          </div>

        </form>
          
      </div>
      
      







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