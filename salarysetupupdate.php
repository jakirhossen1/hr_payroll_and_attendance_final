<?php
     require 'connect.php';
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
                  <?php
                    $Id=$_GET['aid'];
                    $sql="SELECT * FROM salary_setup WHERE salary_setup_id='$Id'";
                    $query= mysqli_query($conn, $sql);
                    $num= mysqli_fetch_array($query)
                  
                  ?>  
                    
                    
                    <form action="salarysetupupdatedetails.php" method="post" enctype="multipart/form-data" id="myform">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="margin:10px;"> Update Salary Setup</h3>
                            </div>
                        </div>
                        <hr>
                        <!-- add salary table start -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input type="hidden" name="id" id="id" value="<?php echo $num['salary_setup_id'];?>">


                                <?php 
    
                                                $sql="SELECT employee_name FROM employee";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
                                <select class="form-select" name="empNam" id="empNam" readonly >
                                  

                                    <option value=""><?php echo $num['employe_Name'];?></option>

                                    <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                                    <option value="<?php echo $row['employee_name'];?>"><?php echo $row['employee_name'];?></option>
                                    <?php
                }
                
                ?>

                                </select><br>

                                <?php 
    
                                                $sql="SELECT salary_Type FROM salary_type";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
                                <select class="form-select" name="salaryTyp" id="salaryTyp"  >
                                   

                                    <option value="<?php echo $num['salary_types'];?>"><?php echo $num['salary_types'];?></option>

                                    <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                                    <option value="<?php echo $row['salary_Type'];?>"><?php echo $row['salary_Type'];?></option>
                                    <?php
                }
                
                ?>

                                </select>
<input type="number" name="basicSalary" id="basicSalary" class="form-control mt-3"  value="<?php echo $num['basic_salary'];?>">

<input type="number" name="medical" id="medical" class="form-control mt-3"  value="<?php echo $num['medical'];?>">

<input type="number" name="house" id="house" class="form-control mt-3"  value="<?php echo $num['house_rent'];?>">

<input type="number" name="food" id="food" class="form-control mt-3"  value="<?php echo $num['food'];?>">

<input type="number" name="provi" id="provi" class="form-control mt-3"  value="<?php echo $num['provident_fund'];?>">

<input type="submit" name="update" id="" class="btn btn-primary bx-pull-right mt-3" value="Update">


                            </div>
                            <div class="col-md-3"></div>
                        </div>

                    </form>
                </div>
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