<?php require "connect.php";
date_default_timezone_set("Asia/Dhaka");
session_start();
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
                                <h3 style="margin:10px;">Salary Report</h3>
                            </div>
                        </div>
                        <hr>
                        <!--            Jakir vai code here-->
                        <div class="row">
                            <div class="col-md-3">
                                <?php
$sql = "SELECT employee_name FROM employee";
$query = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($query);
?>
                                <select class="form-select" name="select_employee" id="emptype">

                                    <option value="">Select Employee</option>
                                    <option value="AllEmp"> All Employee</option>

                                    <?php
for ($i = 1;$i <= $rowcount;$i++)
{
    $row = mysqli_fetch_array($query);
?>
                                    <option value="<?php echo $row['employee_name']; ?>"><?php echo $row['employee_name']; ?></option>
                                    <?php
}

?>

                                </select>
                            </div>
                            <div class="col-md-2" id="hiddenDiv">
                                <select class="form-select" name="statusp" id="">
                                    <option value="All">All
                                    </option>
                                    <option value="basic_salary">Basic Salary</option>
                                    <option value="medical">Medical</option>
                                    <option value="house_rent">House Rent</option>
                                    <option value="food">Food</option>
                                    <option value="provident_fund">Provident</option>
                                    <option value="net_salary">Net Salary</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                 <select class="form-select" name="year" id="">
                                                <?php 
                                                for($i=1900;$i<=date("Y");$i++){
                                                
                                                ?>
                                                <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
                                                <?php }?>
                                            </select>
                            </div>
                            <div class="col-md-3">

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
                            <div class="col-md-1">
                                <input class="btn btn-primary bx-pull-right" type="submit" name="report" id="" value="Show">
                            </div>
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
if (isset($_POST['report']))
{
    $emp = $_POST['select_employee'];
    @$status=$_POST['statusp'];
    $year=$_POST['year'];
    $month=$_POST['dob-month'];
    
    if($emp == 'AllEmp' && $status =='basic_salary'||$emp == 'AllEmp' && $status =='house_rent'|| $emp == 'AllEmp' && $status =='medical'||$emp == 'AllEmp' && $status =='food'||$emp == 'AllEmp' && $status =='provident_fund'||$emp == 'AllEmp' && $status =='net_salary'){
        echo '<caption><center><h3> '.$status. ' Report</h3></center></caption>';
                echo "<hr>";
        echo '<table class="table table-bordered"><tr>
                                    <th>Name</th>
                                    <th>'.$status.'</th>
                        
                                </tr>';
       $sqll = "Select employe_id, $status  from salary Where salary_year='$year' && salary_Month='$month'";
        $qurr = mysqli_query($conn, $sqll);
        while ($row = mysqli_fetch_array($qurr))
        {

?>
                            <tr>
                               <td><?php echo $row['employe_id']; ?></td>
                               <td><?php echo $row[$status]; ?></td>
                            </tr>
<button class="btn btn-primary bx-pull-right m-3" onclick=attenPrint()>Print Report
                        </button>
                            <?php return false;
        }}?>
                           
                            <?php echo "</table>";?>
                           
    
 <?php
    
    if ($emp == 'AllEmp' && $status =='All' )
        
    {
         echo '<caption><center><h3> '.$emp. ' Salary Report</h3></center></caption>';
                echo "<hr>";
        echo '<table class="table table-bordered"><tr>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>Basic Salary</th>
                                    <th>Medical</th>
                                    <th>House</th>
                                    <th>Food</th>
                                    <th>Provident</th>
                                    <th>Net Salary</th>
                                </tr>';
        $sqll = "Select * from salary Where salary_year='$year' && salary_Month='$month'";
        $qurr = mysqli_query($conn, $sqll);
        while ($row = mysqli_fetch_array($qurr))
        {

?>
                            <tr>
                                <td><?php echo $row['employe_id']; ?></td>
                                <td><?php echo $row['salary_year']; ?></td>
                                <td><?php echo $row['salary_Month']; ?></td>
                                <td><?php echo $row['basic_salary']; ?></td>
                                <td><?php echo $row['medical']; ?></td>
                                <td><?php echo $row['house_rent']; ?></td>
                                <td><?php echo $row['food']; ?></td>
                            <td><?php echo $row['provident_fund']; ?></td>
                            <td><?php echo $row['net_salary']; ?></td>
                            </tr>

                            <?php 
        }?>
                            <?php echo "</table>";?>


                            <?php
    }
    else
    {
        echo '<caption><center><h3> '.$emp. ' Salary Report</h3></center></caption>';
                echo "<hr>";
        echo '<table class="table table-bordered"><tr>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>Basic Salary</th>
                                    <th>Medical</th>
                                    <th>House</th>
                                    <th>Food</th>
                                    <th>Provident</th>
                                    <th>Net Salary</th>
                                </tr>';
        $sqll = "Select * from salary Where employe_id='$emp' && salary_year='$year' && salary_Month='$month'";
        $qurr = mysqli_query($conn, $sqll);
        while ($row = mysqli_fetch_array($qurr))
        {

?>
                            <tr>
                               <td><?php echo $row['employe_id']; ?></td>
                                <td><?php echo $row['salary_year']; ?></td>
                                <td><?php echo $row['salary_Month']; ?></td>
                                <td><?php echo $row['basic_salary']; ?></td>
                                <td><?php echo $row['medical']; ?></td>
                                <td><?php echo $row['house_rent']; ?></td>
                                <td><?php echo $row['food']; ?></td>
                            <td><?php echo $row['provident_fund']; ?></td>
                            <td><?php echo $row['net_salary']; ?></td>
                            </tr>

                            <?php 
        }?>
                            <?php echo "</table>";?>



                            <?php
    }
} ?>



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
    <script>
        $(document).ready(function() {
            $('#hiddenDiv').hide();
            $('#emptype').change(function() {
                var emptype = $('#emptype').val();
                if (emptype == 'AllEmp') {
                    $('#hiddenDiv').show();
                } else {
                    $('#hiddenDiv').hide();
                }
            });


        });

    </script>
</body>

</html>
