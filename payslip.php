<?php require "connect.php";
require "inwordsFunction.php";
@session_start();
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

            <div class="modal-content" >
                <div class="forms-body" id="myDiv">
                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <?php 
        $id=$_GET["aid"];
            $month=$_SESSION['selectMonth'];
            $Year=$_SESSION['selectYear'];

                    $idd=$_GET["aid"];
                                            $sqlssss=" SELECT * FROM employee WHERE employee_name='$idd'";
                                            $querryssss= mysqli_query($conn, $sqlssss);
                                    $rows=mysqli_fetch_array($querryssss) ;                       
        
        
        ?>
                            <div class="col-md-12">
                                <div class="text-center lh-1 mb-2">
                                    <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip for the month of <?php echo $month." ".$Year;?></span>
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">EMP Code</span> <small class="ms-3"><?php echo $rows['employee_code'];?></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3"><?php echo $rows['employee_name'];?></small> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Phone No.</span> <small class="ms-3"><?php echo $rows['phone'];?></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">NOD</span> <small class="ms-3">28</small> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">ESI No.</span> <small class="ms-3"></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                               <?php 
                                                $bankSql="SELECT * FROM  bank Where employee_id='$idd'";
                                                $bankQurey=mysqli_query($conn, $bankSql);
                                                $bankresult=mysqli_fetch_array($bankQurey);
                                                
                                                ?>
                                                <div> <span class="fw-bolder">Method of Pay</span> <small class="ms-3"> <?php echo $bankresult['bank_name'];?></small> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Designation</span> <small class="ms-3"><?php echo $rows['designation_id'];?></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Ac No.</span> <small class="ms-3"><?php echo $bankresult['account_no'];?></small> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="mt-4 table table-bordered">
                                        <thead class="bg-dark text-white">

                                            <?php 
                        
                         $idd=$_GET["aid"];
                                      $month=$_SESSION['selectMonth'];
                                       $Year=$_SESSION['selectYear'];
                                            $sqlss=" SELECT * FROM salary Where employe_id='$idd' && salary_year='$Year' && salary_Month='$month'";
                                            $querryss= mysqli_query($conn, $sqlss);
                                        $rowss= mysqli_fetch_array($querryss);
                                            $basic=$rowss['basic_salary'];
                                            $medical=$rowss['medical'];
                                            $house=$rowss['house_rent'];
                                            $food=$rowss['food'];
                                            $provident=$rowss['provident_fund'];
                                            $totalEng=$basic+$medical+$house+$food;
                                       
                        
                        ?>
                                            <tr>
                                                <th scope="col">Earnings</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Deductions</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">Basic Salary</td>
                                                <td><?php echo $rowss['basic_salary']; ?></td>
                                                <td>Provident Fund</td>
                                                <td><?php echo $rowss['provident_fund']; ?></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Medical</td>
                                                <td><?php echo $rowss['medical']; ?></td>
                                                <?php 
                                                $idd=$_GET["aid"];
                                      $month=$_SESSION['selectMonth'];
                                       $Year=$_SESSION['selectYear'];
                                            $sqlsss=" SELECT * FROM deduction Where employee_id='$idd' && deduction_year='$Year' && month='$month'";
                                            $querrysss= mysqli_query($conn, $sqlsss);
                                        $rowsss= mysqli_fetch_array($querrysss);
                                                $absentAmount=$rowsss['amount'];
                                                $totalDeduction=$provident+$absentAmount;
                                                
                                                ?>
                                                
                                                <td>By Absent</td>
                                                <td><?php echo @$rowsss['amount']; ?></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">House Rent</td>
                                                <td><?php echo $rowss['house_rent']; ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Food</td>
                                                <td><?php echo $rowss['food']; ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            

                                            <tr class="border-top">
                                                <td scope="row" class="fw-bold">Total Income</td>
                                                <td class="fw-bold"><?php echo @$totalEng; ?></td>
                                                <td class="fw-bold">Total Deductions</td>
                                                <td class="fw-bold"><?php echo @$totalDeduction?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"> <br> <span class="fw-bold">Net Pay :<?php echo $rowss['net_salary'];?> </span> </div>
                                    <div class="border col-md-8">
                                        <?php
                   $class_obj = new numbertowordconvertsconver();
                    $class_obj->convert_number($rowss['net_salary']);
                    ?>
                                        <div class="d-flex flex-column"> <span>In Words</span> <span><?php echo $class_obj->convert_number($rowss['net_salary'])." "."Taka Only."; ?></span> </div>
                                    </div>
                                </div><br>
                                <div class="d-flex justify-content-end">
                                   <?php 
                                    $sql=" SELECT * FROM company";
                                            $querrys= mysqli_query($conn, $sql);
                                          $row= mysqli_fetch_array($querrys)
                                    
                                    
                                    ?>
                                    <div class="d-flex flex-column mt-2"> <span class="fw-bolder"><?php echo $row['Name'];?></span> <span class="mt-4">Authorised Signature</span> </div>
                                </div>
                            </div>
                            
        
                        </div>
                    </div>
                </div>
                    <div class="row">
                     <div class="col-md-5"></div> 
                     <div class="col-md-4">
                         <button class="btn btn-primary" onclick="payslipprint()">Print</button>
                     </div> 
                     <div class="col-md-3"></div> 
    
  
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
    function payslipprint(){
        var body=document.getElementById('body').innerHTML;
        var mydiv=document.getElementById('myDiv').innerHTML;
        document.getElementById('body').innerHTML=mydiv;
        window.print(mydiv);
        document.getElementById('body').innerHTML=body;
    }
    
    
    </script>

</body>

</html>
