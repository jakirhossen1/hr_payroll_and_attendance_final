<?php require "connect.php";
    date_default_timezone_set("Asia/Dhaka");
    @session_start();
    if (!isset($_SESSION['userName']))
    {
        header("location:Login.php");
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
        .forms-body {
            margin: 10px;
        }

    </style>
</head>

<body id="body">


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
            <div class="modal-content">
                <div class="forms-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="margin:10px;">Expense Report</h3>
                            </div>
                        </div>
                        <hr>
                        <!--            Jakir vai code here-->
                        <div class="row">
                            <div class="col-md-2"></div> 
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input class="form-control" type="date" name="start" id="">
                                    </div>
                                    <div class="col-md-5">
                                        <input class="form-control" type="date" name="end" id="">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="btn btn-primary" type="submit" name="report" id="" value="show">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-2"></div> 
                        </div>

                    </form>


                </div>
            </div>
            <hr>

            <div class="modal-content">
                <div class="forms-body" id="printArea">
                    <div class="row">
                        <div class="col-md-12">


                            <?php
if (isset($_POST['report'])){
    $start=$_POST['start'];
    $end=$_POST['end'];
            $sl=1;

   
        echo '<caption><center><h3> Expense Report</h3></center></caption>';
                echo "<hr>";
        echo '<table class="table table-bordered"><tr>
                                    <th>Sl</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                </tr>';
        $sqll = "Select * from expense_list Where  expense_date Between '$start' AND '$end'";
    
        $qurr = mysqli_query($conn, $sqll);
        while ($row = mysqli_fetch_array($qurr))
        {

?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $row['expense_description']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                            </tr>

                            <?php 
        }?>
                           <?php 
    $sqlls = "Select sum(amount) as amt from expense_list Where  expense_date Between '$start' AND '$end'";
    $qurrs = mysqli_query($conn, $sqlls);
    $rows=mysqli_fetch_array($qurrs);
    
                            echo '<tr><td style="font-weight:bold; text-align:right;" colspan="2">total</td><td style="font-weight:bold;">'.$rows['amt'].'</td></tr>';
                            
                            ?>
                           
                            
                            <?php echo "</table>";?>
<div class="inword">
    <p>In words:</p>
    <?php 
    include "inwordsFunction.php";
    $class_obj = new numbertowordconvertsconver();
                    echo $class_obj->convert_number($rows['amt']);
    ?>
</div>


                            <?php
    }
 ?>



                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php 
                        if (isset($_POST['report'])){
                          echo  '<button class="btn btn-primary bx-pull-right m-3" onclick=attenPrint()>Print Report
                        </button>' ;
                        }
                        ?>

                    </div>
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
    <script>
        function attenPrint() {
            var body = document.getElementById('body').innerHTML;
            var printArea = document.getElementById('printArea').innerHTML;
            document.getElementById('body').innerHTML = printArea;
            window.print(printArea);
            document.getElementById('body').innerHTML = body;

        }

    </script>
    </body>

</html>
