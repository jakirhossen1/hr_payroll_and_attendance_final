<?php
    require "connect.php";

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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

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
            <?php echo include("headers.php")?>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <?php echo include("SidebarMenu.php")?>
        </aside>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
        	<div class="row">
        		<div class="row-md-12">
        			<div class="panel">
        				<div class="panel-body">
        					<table class="table table-bordered">
        					  <tr>
        					    <th>SL</th>
        					    <th>Employee Name</th>
        					    <th>Clock In</th>
        					    <th>Clock Out</th>
        					  </tr>
        					  <?php
        					    require "connect.php";
        					    $n=1;
        					    $sql=" SELECT `u`.`full_name` as `username`, `u`.`user_id`, `attendance`.`singInTime`,  `attendance`.`singOutTime`  FROM `user_table` as u RIGHT JOIN `attendance` on `attendance`.`employee_id` = `u`.`user_id`  where `u`.`status` != 'inactive' or `attendance`. `singInTime` ='".date('Y-m-d')."'";
        					    $querry= mysqli_query($conn, $sql);
        					    while ($row= mysqli_fetch_array($querry)) {
        					  ?>
        					    <tr>
        					      <td><?php echo $n++ ?></td>
        					      <td><?php echo $row['username'] ?></td>
        					      <td><?php
        					      	if($row['singInTime']){
        					      	 echo date('d-m-Y h:i a', strtotime($row['singInTime'])); }?></td>

        					      <td><?php
        					      	if($row['singOutTime']) {
        					      	 echo date('d-m-Y h:i a', strtotime($row['singOutTime'])) ;
        					      	}?></td>
        					      
        					    </tr>
        					    <?php }
        					      $num = mysqli_num_rows($querry);
        					      if(! $num):
        					    ?>

        					    <tr>
        					      <td colspan="8"><center>Data not found</center></td>
        					    </tr>

        					      <?php endif ?>
        					</table>
        				</div>
        			</div>
        			
        		</div>
        	</div>
        </main>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script src="jquery-clock-timepicker.min.js"></script>
    <!--app-->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/index.js"></script>

    <script>
        new PerfectScrollbar(".best-product")
        new PerfectScrollbar(".top-sellers-list")

    </script>

    <script>
        $(document).onload(function(){

        });
        function dailyAtten() {
            var dailyAtt = $('#select_employee').val();
            $.ajax({
                url: 'getdailyAttendace.php',
                method: 'POST',
                dataType: 'html',
                data: {
                    dailyAtt: dailyAtt
                },
                success: function(data) {
                    $('#dataShow').html(data);
                }
            })
        }

        function changeBtn(num){
            if(num == 1)
                $(".btn-change").html('<input class="btn btn-primary bx-pull-right mt-3" type="submit" name="submit" value="SignOut">');
            else
                $(".btn-change").html('<input class="btn btn-primary bx-pull-right mt-3" type="submit" name="submit" value="SignIn">');
        }

    </script>

</body>

</html>
