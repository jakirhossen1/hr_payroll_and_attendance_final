<?php 
require "connect.php";
    date_default_timezone_set("Asia/Dhaka");
    @session_start();
    if (!isset($_SESSION['userName']))
    {
        header("location:Login.php");
    }
    
if(isset($_POST['submit'])){
    
    $signin=$_POST['signin'];
    $signout=$_POST['signout'];
    $latecount=$_POST['latecount'];
    $absent=$_POST['absent'];
    $sql="INSERT INTO `attendance_schedule` (`Signin_in_time_setup`, `Sign_out_time_setup`, `Late_Count_time`, `Absent_time`) VALUES ('$signin', '$signout', '$latecount', '$absent')";
    $qureyss=mysqli_query($conn,$sql);
    header("location:attendanceschedulemanage.php");
                     
       
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
                    <form action="" method="post" enctype="multipart/form-data" id="myform" >

                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="margin:10px;">Attendance Schedule</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        Signin Time Setup:<input type="time" name="signin" id="signin" class="form-control mt-3 mb-3 " onkeyup="change(this.id,'errsignin')" onblur="change(this.id,'errsignin')" >
                                        <span id="errsignin"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        Signout Time Setup:<input type="time" name="signout" id="signout" class="form-control mt-3 mb-3 " onkeyup="change(this.id,'errsignout')" onblur="change(this.id,'errsignout')" >
                                        <span id="errsignout"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        Late Count Time:<input type="time" name="latecount" id="latecount" class="form-control mt-3 mb-3 " onkeyup="change(this.id,'errlatecount')" onblur="change(this.id,'errlatecount')" >
                                        <span id="errlatecount"></span> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        Absent Time: <input type="time" name="absent" id="absent" class="form-control mt-3 mb-3 " onkeyup="change(this.id,'errabsent')" onblur="change(this.id,'errabsent')" >
                                        <span id="errabsent"></span>
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
        var Signin= $("#signin").val();
        var Signout= $("#signout").val();
        var Latecount= $("#latecount").val();
        var Absent= $("#absent").val();
        
      if(Signin==""){
            $("#signin").attr("style","border: 3px solid red");
            $("#errsignin").css("color","red");
            $("#errsignin").html("Please select signin time");
            return false;
        }else{
            $("#signin").attr("style","border:");
            $("#errsignin").html("");
        }
      if(Signout==""){
            $("#signout").attr("style","border: 3px solid red");
            $("#errsignout").css("color","red");
            $("#errsignout").html("Please select signout time");
            return false;
        }else{
            $("#signout").attr("style","border:");
            $("#errsignout").html("");
        }
      if(Latecount==""){
            $("#latecount").attr("style","border: 3px solid red");
            $("#errlatecount").css("color","red");
            $("#errlatecount").html("Please select late count time");
            return false;
        }
       else{
           $("#latecount").attr("style","border:");
           $("#errlatecount").html("");
       }
      if(Absent==""){
            $("#absent").attr("style","border: 3px solid red");
            $("#errabsent").css("color","red");
            $("#errabsent").html("Please select absent count time");
            return false;
        }
        else{
            $("#absent").attr("style","border:");
            $("#errabsent").html("");
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
