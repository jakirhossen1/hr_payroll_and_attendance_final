<?php require "connect.php";
session_start();
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

                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="margin:10px;">My Profile</h3>
                        </div>
                    </div>

                </div>
            </div>
            <hr>


            <div class="col-md-3"></div>

            <div class="row">
                <div class="col-6 col-lg-4 align-items-md-center">
                    <div class="card shadow-sm border-0 overflow-hidden">
                        <div class="card-body">
                            <div class="profile-avatar text-center">
                                <?php
                      $user=$_SESSION['userName'];
                      $sql="SELECT * from employee Where email='$user'";
                      $query=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_array($query)){
                      ?>
                                <img src="<?php echo $row['picture'];?>" class="rounded-circle shadow" width="120" height="120" alt="">
                                
                            </div>
                            
                            <div class="d-flex align-items-center justify-content-around mt-5 gap-3">

                            </div>
                            <div class="text-center mt-4">
                       
                                <h4 class="mb-1"><?php echo $row['employee_name'];?></h4>
                                
                                <p class="mb-0 text-secondary"><?php echo $row['district'].",".$row['Countries'];?></p>
                                <div class="mt-4"></div>
                                <h6 class="mb-1"><?php echo $row['department_id']."--".$row['designation_id'];?> </h6>
                                <p class="mb-0 text-secondary">
                                    <h3>
                                        <?php 
                                        if($_SESSION['role_id'] == 1)
                                            { 
                                                echo "Super Admin";
                                            }
                                        elseif($_SESSION['role_id'] == 2){ echo "Admin";}
                                        elseif($_SESSION['role_id'] == 3)
                                            { 
                                                echo "HR";
                                            }
                                        elseif($_SESSION['role_id'] == 4)
                                            { 
                                                echo "Employee";
                                            }
                                        ?>
                                    </h3>
                                    
                                </p>
                            </div>
                            <?php }?>
                            <hr>
                            <div class="text-start">
                                <h5 class="">About</h5>
                                <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem.
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                                Followers
                                <span class="badge bg-primary rounded-pill">95</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                Following
                                <span class="badge bg-primary rounded-pill">75</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                Templates
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3"></div>

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
