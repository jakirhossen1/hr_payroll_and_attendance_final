<?php 

require "connect.php";

  date_default_timezone_set("Asia/Dhaka");
  @session_start();
  if (!isset($_SESSION['userName']))
  {
      header("location:Login.php");
  }
  
if(isset($_POST['submit'])){
    $month=date("F");
    $employee=$_POST['employee'];
    $date=$_POST['date'];
    $ExpenseDescription=$_POST['ExpenseDescription'];
    $ExpenseAmount=$_POST['ExpenseAmount'];
    
    $s="SELECT expense_description FROM expense_list WHERE expense_description='$ExpenseDescription' && expense_date='$date'";
    $qurey=mysqli_query($conn,$s);
    $num=mysqli_num_rows($qurey);
    if($num==1){
        echo "Expense Already Exits";
    }else{
        $sql="INSERT INTO `expense_list` (`employee_id`, `expense_date`, `expense_description`, `amount`,`Month`) VALUES ( '$employee', '$date', '$ExpenseDescription', '$ExpenseAmount','$month')";
        $qurey=mysqli_query($conn,$sql);
        echo "Expense Added!";
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
               <h3 style="margin:10px;">Add Expense List</h3>
           </div>
       </div>
       <hr>
       <div class="row">
           <div class="col-md-3">
               
           </div>
           <div class="col-md-6">
               <div class="row">
                    <div class="col-md-12">
                        <?php 
    
                            $sql="SELECT employee_name FROM employee";
                            $query=mysqli_query($conn,$sql);
                            $rowcount=mysqli_num_rows($query);
                            ?>
                            <select class="form-select" name="employee" id="employee" onkeyup="change(this.id,'erremployee')" onblur="change(this.id,'erremployee')" >
                                

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
               <div class="row">
                    <div class="col-md-12">
                        <input type="date" name="date" id="dates" class="form-control mt-3 mb-3 " onkeyup="change(this.id,'errdates')" onblur="change(this.id,'errdates')" >
                        <span id="errdates"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <textarea  row="3"  name="ExpenseDescription" id="ExpenseDescription" class="form-control mt-3 mb-3 " placeholder="Expense Description" onkeyup="change(this.id,'errExpenseDescription')" onblur="change(this.id,'errExpenseDescription')" ></textarea>
                      <span id="errExpenseDescription"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="ExpenseAmount" id="ExpenseAmount" class="form-control mt-3 mb-3 " placeholder="Expense Amount" onkeyup="change(this.id,'errExpenseAmount')" onblur="change(this.id,'errExpenseAmount')" >
                        <span id="errExpenseAmount"></span>
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                       <input class="btn btn-primary mt-3 mb-3 bx-pull-right " type="submit" name="submit" id="" value="Submit">
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
        var Employee= $("#employee").val();
        var Dates= $("#dates").val();
        var ExpenseDescriptions= $("#ExpenseDescription").val();
        var ExpenseAmounts= $("#ExpenseAmount").val();
        
      if(Employee==""){
            $("#employee").attr("style","border: 3px solid red");
            $("#erremployee").css("color","red");
            $("#erremployee").html("Please select any employee");
            return false;
        }else{
            $("#employee").attr("style","border:");
            $("#erremployee").html("");
        }
      if(Dates==""){
            $("#dates").attr("style","border: 3px solid red");
            $("#errdates").css("color","red");
            $("#errdates").html("Please select your expense date");
            return false;
        }else{
            $("#dates").attr("style","border:");
            $("#errdates").html("");
        }
      if(ExpenseDescriptions==""){
            $("#ExpenseDescription").attr("style","border: 3px solid red");
            $("#errExpenseDescription").css("color","red");
            $("#errExpenseDescription").html("Please write your expense message");
            return false;
        }
       else{
           $("#ExpenseDescription").attr("style","border:");
           $("#errExpenseDescription").html("");
       }
      if(ExpenseAmounts==""){
            $("#ExpenseAmount").attr("style","border: 3px solid red");
            $("#errExpenseAmount").css("color","red");
            $("#errExpenseAmount").html("Please enter your expense amount");
            return false;
        }
        else{
            $("#ExpenseAmount").attr("style","border:");
            $("#errExpenseAmount").html("");
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