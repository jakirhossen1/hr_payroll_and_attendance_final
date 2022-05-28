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
                                <h3 style="margin:10px;">Attendance Report</h3>
                            </div>
                        </div>
                        <hr>
                        
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
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="On Leave">Leave</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="date" name="startdate" id="" placeholder="Start date">
                            </div>
                            <div class="col-md-3">

                                <input class="form-control" type="date" name="enddate" id="" placeholder="End date">

                            </div>
                            <div class="col-md-1">
                                <input class="btn btn-primary bx-pull-right" type="submit" name="report" id="" value="show">
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
    $start = $_POST['startdate'];
    $end = $_POST['enddate'];
    @$status=$_POST['statusp'];
    $days = date_diff(date_create($start) , date_create($end));
    if ($emp == 'AllEmp')
        
    {
        echo '<caption><center><h3>Attendance Report</h3></center></caption>';
        echo "<hr>";
        echo '<table class="table table-bordered"><tr><th>Name</th><th>Date</th><th>Days</th><th>'.$status.'</th></tr>';
        $sqlls = "Select `employee_id`,
COUNT(attendaneStatus)as Absent
from attendance WHERE attendaneStatus='$status' && attendancedate Between '$start' AND  '$end' GROUP BY employee_id";

        $qurrs = mysqli_query($conn, $sqlls);
       while($rows = mysqli_fetch_array($qurrs)){ 

?>
                               <tr>
                                   <td><?php echo $rows['employee_id']; ?></td>
                                    
                                    
                                    <td><?php echo $start . " " . "<strong>To</strong>" . " " . $end; ?></td>
                                    <td><?php echo $days->format("%a"); ?></td>
                                    <td><?php echo $rows['Absent']; ?></td>
                            </tr>
                                    <?php }?>
                                    
                                    
                                    
                           
                           <?php echo " </table>"?>


                                <?php
    }
    else
    {
        echo '<caption><center><h3> Individual Attendance Report</h3></center></caption>';
                echo "<hr>";
        echo '<table class="table table-bordered"><tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>SignIn Time</th>
                                    <th>SignOut Time</th>
                                    <th>Status</th>
                                </tr>';
        $sqll = "Select * from attendance Where employee_id='$emp' && attendancedate Between '$start' AND '$end'";
        $qurr = mysqli_query($conn, $sqll);
        while ($row = mysqli_fetch_array($qurr))
        {

?>
                                <tr>
                                    <td><?php echo $row['employee_id']; ?></td>
                                    <td><?php echo $row['attendancedate']; ?></td>
                                    <td><?php $sign=date_create($row['singInTime']);echo date_format($sign, 'g:i A') ; ?></td>
                                    <td><?php  $singOut=date_create($row['singOutTime']);echo date_format($singOut , 'g:i A') ; ?></td>
                                    <td><?php echo $row['attendaneStatus']; ?></td>
                                </tr>
                           
                                <?php 
        }?>
        <?php echo "</table>";?>
        <?php 
        
        
        
        echo '<table class="table table-bordered"><tr><th>Date</th><th>Days</th><th>Present</th><th>Absent</th><th>Leave</th></tr>';
        $sqlls = "Select `employee_id`,
COUNT(attendaneStatus)as Present
from attendance WHERE employee_id='$emp' && attendaneStatus='Present' && attendancedate Between '$start' AND  '$end'";

        $qurrs = mysqli_query($conn, $sqlls);
        $rows = mysqli_fetch_array($qurrs);
                $sqllss = "Select `employee_id`,
COUNT(attendaneStatus)as Abst
from attendance WHERE employee_id='$emp' && attendaneStatus='Absent' && attendancedate Between '$start' AND  '$end'";

        $qurrss = mysqli_query($conn, $sqllss);
        $rowss = mysqli_fetch_array($qurrss);
         $sqllsss = "Select `employee_id`, COUNT(attendaneStatus)as lev from attendance WHERE employee_id='$emp' && attendaneStatus='On Leave' && attendancedate Between '$start' AND '$end'";

        $qurrsss = mysqli_query($conn, $sqllsss);
        $rowsss = mysqli_fetch_array($qurrsss);
        
            
       

?>
                               <tr>
                                    <td><?php echo $start . " " . "<strong>To</strong>" . " " . $end; ?></td>
                                    <td><?php echo $days->format("%a"); ?></td>
                                    <td><?php echo $rows['Present']; ?></td>
                                 



                                    <td><?php echo $rowss['Abst']; ?></td>

                                

                                    <td><?php echo $rowsss['lev']; ?></td>
                       </tr>
                      <?php echo  "</table>";?>
        
        
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
    function attenPrint(){
        var body=document.getElementById('body').innerHTML;
        var printArea=document.getElementById('printArea').innerHTML;
        document.getElementById('body').innerHTML=printArea;
        window.print(printArea);
         document.getElementById('body').innerHTML=body;
        
    }
    
    
    </script>
    <script>
    $(document).ready(function(){
         $('#hiddenDiv').hide();
        $('#emptype').change(function(){
        var emptype=$('#emptype').val();
      if(emptype=='AllEmp'){
          $('#hiddenDiv').show();
      }else{
           $('#hiddenDiv').hide();
      }
        });
       
       
    });
    </script>
</body>

</html>
