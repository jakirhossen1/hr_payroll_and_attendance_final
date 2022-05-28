<?php require 'connect.php'; 
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
               <h3 style="margin:10px;">Employee Documents</h3>
           </div>
       </div>
       <hr>
       
       <div class="row">
               
          <div class="col-md-3"></div> 
          <div class="col-md-6">
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
              <input type="text" name="document_name" id="document_name" class="form-control mt-3" placeholder="Document Name" onkeyup="change(this.id,'errdocument_name')" onblur="change(this.id,'errdocument_name')"  >
              <span id="errdocument_name"></span><br>
              <select class="form-select" name="document_status" id="document_status" onkeyup="change(this.id,'errdocument_status')" onblur="change(this.id,'errdocument_status')" >
                    
                    <option value="">Select Document_Status</option>
                    <option value="Valid">Valid</option>
                    <option value="Invalid">Invalid</option>
                    
                </select>
              <span id="errdocument_status"></span>
          </div>
          <div class="col-md-3"></div>
           
       </div>
       
       <div class="row">
           <div class="col-md-3"></div>
           <div class="col-md-6">
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
        var Document_name= $("#document_name").val();
        var Document_status= $("#document_status").val();
       
        
      if(Employee==""){
            $("#employee").attr("style","border: 3px solid red");
            $("#erremployee").css("color","red");
            $("#erremployee").html("Please select any employee");
            return false;
        }else{
            $("#employee").attr("style","border:");
            $("#erremployee").html("");
        }
      if(Document_name==""){
            $("#document_name").attr("style","border: 3px solid red");
            $("#errdocument_name").css("color","red");
            $("#errdocument_name").html("Please write document name");
            return false;
        }else{
            $("#document_name").attr("style","border:");
            $("#errdocument_name").html("");
        }
      if(Document_status==""){
            $("#document_status").attr("style","border: 3px solid red");
            $("#errdocument_status").css("color","red");
            $("#errdocument_status").html("Please select your document status");
            return false;
        }
       else{
           $("#document_status").attr("style","border:");
           $("#errdocument_status").html("");
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
           




        <?php
            
        if(isset($_POST['submit'])){
            $employee=$_POST['employee'];
            $document_name=$_POST['document_name'];
            $document_status=$_POST['document_status'];
            
           $sql="INSERT INTO `employee_document` (`Emlpoyee_id`, `Document_Name`, `Document_Status`) VALUES ('$employee', '$document_name', '$document_status')";
           $querry= mysqli_query($conn, $sql);
           
           if($querry){
               echo 'Document Added Successfully';
           }
           else{
               echo 'Document is not  Added!';
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