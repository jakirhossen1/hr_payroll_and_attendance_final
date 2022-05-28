<?php require "connect.php";
date_default_timezone_set("Asia/Dhaka");
session_start();
if(!isset($_SESSION['userName'])){
  header("location:Login.php");  
}
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $fullname=$_POST['fullname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $userRole=$_POST['roleId'];
    $accountCreation=date("Y-m-d");
    $status=$_POST['status'];
    $s="SELECT * FROM user_table WHERE email='$email'";
    $result=mysqli_query($conn,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "Email  Already Exits";
    }else{
       $sqls="INSERT INTO `user_table` ( `user_name`, `full_name`, `email`, `phone`, `password`, `role_id`, `account_creation_date`, `status`) VALUES ('$username', '$fullname', '$email', '$phone', '$password', '$userRole', '$accountCreation', '$status')";
    $query=mysqli_query($conn,$sqls);
        header("location:userManage.php");
    }
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
    
    
      .forms-body{
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
        <form action="" method="post" enctype="multipart/form-data" id="myform">      
            <div class="row">
                <div class="col-md-12">
                  <h3 style="margin:10px;">Add Users</h3>
                </div>
            </div><hr>
<!--            Jakir vai code here-->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control mt-3" id="username" placeholder="Please Write Your User Name" onkeyup="change(this.id,'errusername')" onblur="change(this.id,'errusername')" > 
                            <span id="errusername"></span><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <?php 
    
                                                $sql="SELECT role_name FROM user_role";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
            <select class="form-select" name="roleId" id="roleId" onkeyup="change(this.id,'errroleId')" onblur="change(this.id,'errroleId')" >
                
                
                <option value="">Select Role</option>
                
                <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                    <option value="<?php echo $row['role_name'];?>"><?php echo $row['role_name'];?></option>
                    <?php
                }
                
                ?>
                
            </select>
             <span id="errroleId"></span>               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="fullname" class="form-control mt-3" id="fullname"  placeholder="Please Write Your Full Name" onkeyup="change(this.id,'errfullname')" onblur="change(this.id,'errfullname')"  > 
                            <span id="errfullname"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <input type="number" name="phone" class="form-control mt-3" id="phone" placeholder="Please Write Your Phone Number" onkeyup="change(this.id,'errphone','mobile')" onblur="change(this.id,'errphone','mobile')" > 
                            <span id="errphone"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <input type="email" name="email" class="form-control mt-3" id="email" placeholder="Please Write Your Email Address" onkeyup="change(this.id,'erremail')" onblur="change(this.id,'erremail')" > 
                        <span id="erremail"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="password" class="form-control mt-3" name="password" id="password" placeholder="Please Write Your Password" onkeyup="change(this.id,'errpassword')" onblur="change(this.id,'errpassword')" > 
                            <span id="errpassword"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                               <select name="status" class="form-select mt-3"id="status" onkeyup="change(this.id,'errstatus')" onblur="change(this.id,'errstatus')" >
                                   
                                    <option value="">Select Your Status</option>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                               </select>
                            <span id="errstatus"></span>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                         <input class="btn btn-primary mt-3 bx-pull-right " type="submit" name="submit" id="" value="Save">
                    </div>
                   
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
               
        </form>
      </div>
    </div>


           
           
<script type="text/JavaScript">
   $("#myform").submit(function(){
        var Username= $("#username").val();
        var RoleId= $("#roleId").val();
        var Fullname= $("#fullname").val();
        var Phone= $("#phone").val();
        var Email= $("#email").val();
        var Password= $("#password").val();
        var Status= $("#status").val();
        
        
        if(Username==""){
            $("#username").attr("style","border: 3px solid red");
            $("#errusername").css("color","red");
            $("#errusername").html("Please write your user name");
            return false;
        }else{
            $("#username").attr("style","border:");
            $("#errusername").html("");
        }
      if(RoleId==""){
            $("#roleId").attr("style","border: 3px solid red");
            $("#errroleId").css("color","red");
            $("#errroleId").html("Please enter your user roleid");
            return false;
        }
       else{
           $("#roleId").attr("style","border:");
           $("#errroleId").html("");
       }
      if(Fullname==""){
            $("#fullname").attr("style","border: 3px solid red");
            $("#errfullname").css("color","red");
            $("#errfullname").html("Please enter your full name");
            return false;
        }
        else{
            $("#fullname").attr("style","border:");
            $("#errfullname").html("");
        }
        if(Phone==""){
            $("#phone").attr("style","border: 3px solid red");
            $("#errphone").css("color","red");
            $("#errphone").html("Please enter your mobile number");
            return false;
        }else{
            $("#phone").attr("style","border:");
            $("#errphone").html("");
        }
      if(Email==""){
            $("#email").attr("style","border: 3px solid red");
            $("#erremail").css("color","red");
            $("#erremail").html("Please write your user email address");
            return false;
        }
       else{
           $("#email").attr("style","border:");
           $("#erremail").html("");
       }
      if(Password==""){
            $("#password").attr("style","border: 3px solid red");
            $("#errpassword").css("color","red");
            $("#errpassword").html("Please enter your user password");
            return false;
        }
        else{
            $("#password").attr("style","border:");
            $("#errpassword").html("");
        }
      if(Status==""){
            $("#status").attr("style","border: 3px solid red");
            $("#errstatus").css("color","red");
            $("#errstatus").html("Please select your user status");
            return false;
        }
        else{
            $("#status").attr("style","border:");
            $("#errstatus").html("");
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
        if(type=="mobile"){
            if(get==""){
            $("#"+id).attr("style","border: 3px solid red");
            $("#"+msg).css("color","red");
            $("#"+msg).html("This field must not be empty!");
            
        }else if(get.length!==11){
            $("#"+id).attr("style","border: 3px solid red");
            $("#"+msg).css("color","red");
            $("#"+msg).html("Mobile number must be 11 digit");
        }
        else{
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