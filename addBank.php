<?php 
require "connect.php";
date_default_timezone_set("Asia/Dhaka");
session_start();
if(!isset($_SESSION['userName'])){
  header("location:Login.php");  
}
if(isset($_POST['submit'])){
    
    
    $BankName=$_POST['BankName'];
    $employee=$_POST['employee'];
    $BranchName=$_POST['BranchName'];
    $City=$_POST['City'];
    $AccountNo=$_POST['AccountNo'];
    $SwiftCode=$_POST['SwiftCode'];
    
    
    
        $sqla="INSERT INTO `bank` (`bank_name`, `employee_id`, `branch`, `city`, `account_no`, `swift_code`) VALUES ( '$BankName','$employee','$BranchName', '$City', '$AccountNo', '$SwiftCode')";
        $qureya=mysqli_query($conn,$sqla);    
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
                  <h3 style="margin:10px;">Bank Details</h3>
                </div>
            </div><hr>
<!--            saidur vai code here-->
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
              <div class="row">
                        <div class="col-md-12">
                        <?php 
    
                                                $sql="SELECT employee_name FROM employee";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
            <select class="form-select" name="employee" id="employee" onkeyup="change(this.id,'erremployee','data')" onblur="change(this.id,'erremployee','data')" >
                
                
                <option value="">Select Employee</option>
                
                <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                    <option value="<?php echo $row['employee_name'];?>"><?php echo $row['employee_name'];?></option>
                    <?php
                }
                
                ?>
                
            </select>
            <span id="erremployee"></span>             

                        </div>
                    </div>
                
                  <input type="text" name="BankName" id="BankName" class="form-control mt-3" placeholder="Bank Name" onkeyup="change(this.id,'errBankName')" onblur="change(this.id,'errBankName')" >
                   <span id="errBankName"></span>
                
                  <input type="text" name="BranchName" id="BranchName" class="form-control mt-3" placeholder="Branch Name" onkeyup="change(this.id,'errBranchName')" onblur="change(this.id,'errBranchName')" >
                   <span id="errBranchName"></span>
                
                  <input type="text" name="City" id="City" class="form-control mt-3" placeholder="City" onkeyup="change(this.id,'errCity')" onblur="change(this.id,'errCity')" >
                   <span id="errCity"></span>

                  <input type="number" name="AccountNo" id="AccountNo" class="form-control mt-3" placeholder="Account No" onkeyup="change(this.id,'errAccountNo')" onblur="change(this.id,'errAccountNo')" >
                   <span id="errAccountNo"></span>
                   
                  <input type="text" name="SwiftCode" id="SwiftCode" class="form-control mt-3" placeholder="Swift Code" onkeyup="change(this.id,'errSwiftCode')" onblur="change(this.id,'errSwiftCode')" >
                   <span id="errSwiftCode"></span>
                
                  <input type="submit" name="submit" id="" class="btn btn-primary bx-pull-right mt-3" value="Save">
               
                  
              </div>
              <div class="col-md-3"></div>
            </div>  
               
        </form>
      </div>
    </div>


        <script type="text/JavaScript">
   $("#myform").submit(function(){
        var Employee= $("#employee").val();
        var BankNames= $("#BankName").val();
        var BranchNames= $("#BranchName").val();
        var Citys= $("#City").val();
        var AccountNos= $("#AccountNo").val();
        var SwiftCodes= $("#SwiftCode").val();
        
        if(Employee==""){
            $("#employee").attr("style","border: 3px solid red");
            $("#erremployee").css("color","red");
            $("#erremployee").html("Please select any employee");
            return false;
        }else{
            $("#employee").attr("style","border:");
            $("#erremployee").html("");
        }
      if(BankNames==""){
            $("#BankName").attr("style","border: 3px solid red");
            $("#errBankName").css("color","red");
            $("#errBankName").html("Please select your bank name");
            return false;
        }
       else{
           $("#BankName").attr("style","border:");
           $("#errBankName").html("");
       }
      if(BranchNames==""){
            $("#BranchName").attr("style","border: 3px solid red");
            $("#errBranchName").css("color","red");
            $("#errBranchName").html("Please your branch name");
            return false;
        }
        else{
            $("#BranchName").attr("style","border:");
            $("#errBranchName").html("");
        }
        if(Citys==""){
            $("#City").attr("style","border: 3px solid red");
            $("#errCity").css("color","red");
            $("#errCity").html("Please select your city");
            return false;
        }else{
            $("#City").attr("style","border:");
            $("#errCity").html("");
        }
      if(AccountNos==""){
            $("#AccountNo").attr("style","border: 3px solid red");
            $("#errAccountNo").css("color","red");
            $("#errAccountNo").html("Please write your account number");
            return false;
        }
       else{
           $("#AccountNo").attr("style","border:");
           $("#errAccountNo").html("");
       }
      if(SwiftCodes==""){
            $("#SwiftCode").attr("style","border: 3px solid red");
            $("#errSwiftCode").css("color","red");
            $("#errSwiftCode").html("Please write your swiftcode");
            return false;
        }
        else{
            $("#SwiftCode").attr("style","border:");
            $("#errSwiftCode").html("");
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
        if(type=="data"){
            if(get==""){
            $("#"+id).attr("style","border: 3px solid red");
            $("#"+msg).css("color","red");
            $("#"+msg).html("Please select any option");
            
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