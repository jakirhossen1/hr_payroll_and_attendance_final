<?php 

  require "connect.php";
  date_default_timezone_set("Asia/Dhaka");
  @session_start();
  if (!isset($_SESSION['userName']))
  {
      header("location:Login.php");
  }
  
if(isset($_POST['submit'])){
    
    $SelectEmployee=$_POST['SelectEmployee'];
    $dates=$_POST['dates'];
    $expensename=$_POST['expensename'];
    $amount=$_POST['amount'];
    $files=$_POST['files'];
    $status=$_POST['status'];
    
    
        $sql="INSERT INTO claims(employee_id,claims_date,type_of_expense,total_amount,claims_status) Values('$SelectEmployee','$dates','$expensename','$amount','$status')";
        $qurey=mysqli_query($conn,$sql);
        echo "Expense Added!";
       
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
               <h3 style="margin:10px;">Add Claims</h3>
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
                                <select class="form-select" name="SelectEmployee" id="SelectEmployee" onkeyup="change(this.id,'errSelectEmployee')" onblur="change(this.id,'errSelectEmployee')" >
                                    

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
                        <span id="errSelectEmployee"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                       <input type="date" name="dates" id="dates" class="form-control mt-3 mb-3 " onkeyup="change(this.id,'errdates')" onblur="change(this.id,'errdates')" >
                       <span id="errdates"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="expensename" id="expensename" class="form-control mt-3 mb-3 " placeholder="Please enter your expense type" onkeyup="change(this.id,'errexpensename')" onblur="change(this.id,'errexpensename')" >
                        <span id="errexpensename"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="amount" id="amount" class="form-control mt-3 mb-3 " placeholder="Please enter your amount" onkeyup="change(this.id,'erramount')" onblur="change(this.id,'erramount')" >
                        <span id="erramount"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" name="files" id="files" class="form-control mt-3 mb-3 " onkeyup="change(this.id,'errfiles')" onblur="change(this.id,'errfiles')" >
                        <span id="errfiles"></span>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-12">
                         <select class="form-select mt-3 mb-3" name="status" id="claimstatus" onkeyup="change(this.id,'errclaimstatus','Claim')" onblur="change(this.id,'errclaimstatus','Claim')" >
                             
                             <option value="Select">Select Claims Status</option>
                             <option value="Paid">Paid</option>
                             <option value="Unpaid">Unpaid</option>
                         </select>
                         <span id="errclaimstatus"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input class="btn btn-primary mt-3 mb-3 bx-pull-right" type="submit" name="submit" id="" value="Submit">
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
        var SelectEmployees= $("#SelectEmployee").val();
        var Dates= $("#dates").val();
        var Expensename= $("#expensename").val();
        var Amount= $("#amount").val();
        var Files= $("#files").val();
        var Claimstatus= $("#claimstatus").val();
        
      if(SelectEmployees==""){
            $("#SelectEmployee").attr("style","border: 3px solid red");
            $("#errSelectEmployee").css("color","red");
            $("#errSelectEmployee").html("Please select any employee");
            return false;
        }else{
            $("#SelectEmployee").attr("style","border:");
            $("#errSelectEmployee").html("");
        }
      if(Dates==""){
            $("#dates").attr("style","border: 3px solid red");
            $("#errdates").css("color","red");
            $("#errdates").html("please select your claim date");
            return false;
        }else{
            $("#dates").attr("style","border:");
            $("#errdates").html("");
        }
      if(Expensename==""){
            $("#expensename").attr("style","border: 3px solid red");
            $("#errexpensename").css("color","red");
            $("#errexpensename").html("Please write your claim type");
            return false;
        }
       else{
           $("#expensename").attr("style","border:");
           $("#errexpensename").html("");
       }
      if(Amount==""){
            $("#amount").attr("style","border: 3px solid red");
            $("#erramount").css("color","red");
            $("#erramount").html("Please write your claim amount");
            return false;
        }
        else{
            $("#amount").attr("style","border:");
            $("#erramount").html("");
        }
     if(Files==""){
            $("#files").attr("style","border: 3px solid red");
            $("#errfiles").css("color","red");
            $("#errfiles").html("Please select claim files");
            return false;
        }else{
            $("#files").attr("style","border:");
            $("#errfiles").html("");
        }
      if(Claimstatus==""){
            $("#claimstatus").attr("style","border: 3px solid red");
            $("#errclaimstatus").css("color","red");
            $("#errclaimstatus").html("Please select your claim status");
            return false;
        }else{
            $("#claimstatus").attr("style","border:");
            $("#errclaimstatus").html("");
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
        
        if(type=="Claim"){
            if(get==""){
            $("#"+id).attr("style","border: 3px solid red");
            $("#"+msg).css("color","red");
            $("#"+msg).html("Please select any claim status");
            
        }else{
            $("#"+id).attr("style","border:");
            $("#"+msg).html("");
        }
        
        }
        
       
     
    }
    
</script>





<?php 
       
    if(isset($_POST['submit'])){
        $dates=$_POST['dates'];
        $expensename=$_POST['expensename'];
        $amount=$_POST['amount'];
        $picture="Samad";
        $status=$_POST['status'];
        $select="Jakir";
        $sql="INSERT INTO `claims` (`claims_date`, `type_of_expense`, `total_amount`, `file`, `claims_status`, `claim_status`) VALUES ('$dates', '$expensename', '$amount', '$picture', '$status', '$select') ";
        $query= mysqli_query($conn, $sql);
        if($query){
            echo 'Insert Data Successfully';
        }
        else{
            echo 'Data Insert Failed!';
        }
    }


?>

           
           
           
           
           
           
            
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