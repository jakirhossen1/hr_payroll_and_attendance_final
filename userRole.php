<?php require "connect.php";
if(isset($_POST['submit'])){
    $role_name=$_POST['rolename'];
    $permission=$_POST['permission'];
    $user_role_status=$_POST['status'];
    $s="SELECT * FROM user_role WHERE role_name='$role_name'";
    $result=mysqli_query($conn,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "Role  Already Exits";
    }else{
       
       $sqls="INSERT INTO `user_role` (`role_name`, `permission`, `user_role_status`) VALUES ('$role_name','$permission','$user_role_status');";
    $query=mysqli_query($conn,$sqls);
        header("location:Desboard.php");
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
               <h3 style="margin:10px;">Add User Role</h3>
           </div>
       </div>
       <hr>
       
      <div class="row">  
<!--         jakir vai code here-->
            <div class="col-md-4 ">
                <input type="text" class="form-control" name="rolename"  id="rolename" placeholder="Please Write User Role Name" onkeyup="change(this.id,'errrolename')" onblur="change(this.id,'errrolename')"  > 
                <span id="errrolename"></span>
            </div>
            <div class="col-md-3">
                <select  name="permission" class="form-select" id="permission" onkeyup="change(this.id,'errpermission')" onblur="change(this.id,'errpermission')"  >
                    
                    <option >Select Your Permission</option>
                    <option value="employe">Employe</option>
                    <option value="administratot">Admin</option>
                </select>
                <span id="errpermission"></span>
            </div>
            <div class="col-md-3">
                <select  name="status" class="form-select" id="status" onkeyup="change(this.id,'errstatus')" onblur="change(this.id,'errstatus')"  >
                   
                    <option >Select Your Status</option>
                    <option value="active" >Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                 <span id="errstatus"></span>
            </div>
            <div class="col-md-2">
                <input class="btn btn-primary  " type="submit" name="submit" value="Submit" >
            </div>
       </div>
        
    </form>
    </div>
    </div>

<script type="text/JavaScript">
   $("#myform").submit(function(){
        var Rolename= $("#rolename").val();
        var Permission= $("#permission").val();
        var Status= $("#status").val();
        
      if(Rolename==""){
            $("#rolename").attr("style","border: 3px solid red");
            $("#errrolename").css("color","red");
            $("#errrolename").html("Please enter your user role name");
            return false;
        }else{
            $("#rolename").attr("style","border:");
            $("#errrolename").html("");
        }
      if(Permission==""){
            $("#permission").attr("style","border: 3px solid red");
            $("#errpermission").css("color","red");
            $("#errpermission").html("Please select user permission");
            return false;
        }
       else{
           $("#permission").attr("style","border:");
           $("#errpermission").html("");
       }
     if(Status==""){
            $("#status").attr("style","border: 3px solid red");
            $("#errstatus").css("color","red");
            $("#errstatus").html("Please select your user role status");
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