<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<?php require "connect.php";

date_default_timezone_set("Asia/Dhaka");
session_start();
if(!isset($_SESSION['userName'])){
  header("location:Login.php");  
}

?>

<script type="text/javascript">
    function CheckEmail() {
        var UserEmail = $("#useremail").val();
        $.ajax({
            url: "employeeexits.php",
            method: "POST",
            dataType: "html",
            data: {
                email: UserEmail
            },
            success: function(data) {
                if ($.trim(data) == 1) {
                    $("#useremail").css("border", "3px solid red");
                    $("#user").css("color", " red");
                    $("#user").html("User email already exists!");
                } else {
                    $("#useremail").css("border", "3px solid green");
                    $("#user").css("color", " green");
                    $("#user").html("User email is not exists!");
                }
            }

        });
    }

</script>
|

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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
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

            <?php
                $alert = [];

                if(isset($_POST['submit'])){
                    
                    date_default_timezone_set("asia/dhaka");


                    $username = str_replace(" ", "", strtolower($_POST['employ_name']));
                    $fullname = $_POST['employ_name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['employ_email'];
                    $password = $_POST['employeepass'];
                    $userRole = "4";
                    $accountCreation = date("Y-m-d");
                    $status = "Active";

                    if(empty($fullname)) {
                        $alert['errors'] = "Please enter your fullname.";
                    }

                    if(empty($email)) {
                        $alert['errors'] = "Please enter your email.";
                    }

                    $s = "SELECT * FROM user_table WHERE email='$email'";
                    $result = mysqli_query($conn, $s);
                    $num = mysqli_num_rows($result);

                    $sq = "SELECT * FROM employee WHERE email='$email'";
                    $results = mysqli_query($conn, $sq);
                    $employeess = mysqli_num_rows($results);

                    if(empty($alert)) {
                        if($num == 1 && $employeess == 1){
                            $alert['errors'] = "Email  Already Exits.";
                        }else{
                            $today=date("Y-m-d");
                            $fullname=$_POST['employ_name'];
                            $email=$_POST['employ_email'];
                            $gender=$_POST['gen'];
                            $marital_status=$_POST['marital_status'];
                            $DOB=$_POST['employ_date_of_birth'];
                            //$picture=$_POST['employmet_picture'];
                            $religion=$_POST['employ_religion'];
                            $distic=$_POST['employ_district'];
                            $country=$_POST['employ_countris'];
                            $phone=$_POST['phone'];
                            $postCode=$_POST['employ_postal_code'];
                            $nationality=$_POST['employ_nationality'];
                            $presentAddress=$_POST['present_address'];
                            $nationality=$_POST['employ_nationality'];
                            $preaddress=$_POST['present_address'];
                            $peraddress=$_POST['permanent_address'];
                            $passNid=$_POST['employ_nid'];
                            $status="Active";
                            //$Empemail=$_POST['employeeemail'];
                            $Emppass=$_POST['employeepass'];
                            $EmptypeId=$_POST['employment_id'];
                            $deptId=$_POST['department_id'];
                            $designationId=$_POST['designation'];
                            $appointdate=$_POST['appointment_date'];
                            $joindate=$_POST['joining_date'];
                            $Empcode=$_POST['employee_code'];
                            $Created_by=$_POST['created_by'];
                            //$Empstatus=$_POST['employement_status'];
                            $dir='uploads/';
                            $path=$dir.basename($_FILES['employmet_picture']['name']);
                            $temp=$_FILES['employmet_picture']['tmp_name'];

                            if(move_uploaded_file($temp,$path)){}

                            // user insert
                            $s = "SELECT * FROM `user_table` WHERE email='$email'";
                            $result = mysqli_query($conn, $s);
                            $num = mysqli_num_rows($result);
                            if ($num == 0) {
                                
                                $sqls = "INSERT INTO `user_table` ( `user_name`, `full_name`, `email`, `phone`, `password`, `role_id`, `account_creation_date`, `status`, `created_by`) VALUES ('$fullname', '$fullname', '$email', '$phone', '$Emppass', '4', '$today', '$status','$Created_by')";

                                $user_id = "SELECT 'user_id' FROM employee WHERE email='$email'";

                                $query = mysqli_query($conn, $sqls);
                                if ($query) {
                                  // as a employee insert
                                    $sq = "SELECT * FROM employee WHERE email='$email'";
                                    $results = mysqli_query($conn, $sq);
                                    $nums = mysqli_num_rows($results);
                                    if ($nums == 1) {
                                        $alert['errors'] = "Employee  Already Exits";
                                    } else {
                                        $sql = "INSERT INTO employee (employee_type_id,department_id,designation_id,employee_name, appointment_date, date_of_birth, employee_code, email, joining_date, employee_status, religion, nationality, district, Countries, postal_code, Passport_or_NID, gender, maritial_Status, present_address, permanent_address, picture, phone, created_by, 'user_id') VALUES ( '$EmptypeId', '$deptId','$designationId', '$fullname', '$appointdate', '$DOB', '$Empcode', '$email', '$joindate', '$status', '$religion', '$nationality', '$distic', '$country', '$postCode', '$passNid', '$gender', '$marital_status', '$preaddress', '$peraddress', '$path', '$phone', '$Created_by', '$user_id');";
                                        $query = mysqli_query($conn, $sql);
                                        $alert['success'] =  "Employee Added.";
                                    }
                                } else {
                                    $alert['errors'] = "Not Add Employee.";
                                }
                            } else {
                                $alert['errors'] = "User  Already Exits.";
                            }
                        }
                    }
                }
            
            ?>

            <?php 

                if($alert) {
                    if(isset($alert['success'])){ ?>

                        <div class="alert alert-success">
                            <?php echo $alert['success'] ?>
                        </div>
                   <?php }

                    if(isset($alert['errors'])){ ?>
                        <div class="alert alert-danger">
                            <?php echo $alert['errors'] ?>
                        </div> 
                    <?php }
                }
            ?>
            <!--Enter Your Code here-->

            <div class="forms-body">
                <form action="" method="post" enctype="multipart/form-data" id="myform">

                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="margin:10px;">Add Employee</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <!-- personal information Start -->
                        <div class="col-md-6">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-info">Personal information</h4>
                                </div>

                                <div class="modal-body">
                                    <input class="form-control" type="text" name="employ_name" id="employ_name" placeholder="Employee Name" onkeyup="change(this.id,'erremploy_name')" onblur="change(this.id,'erremploy_name')" >
                                    <span id="erremploy_name"></span><br>

                                    <select class="form-select" name="gen" id="gen" onkeyup="change(this.id,'errgen')" onblur="change(this.id,'errgen')" >
                                        
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <span id="errgen"></span><br>

                                    <label class="form-control" for="marital_status">Marital Status: <select name="marital_status" id="marital_status" class="form-select" onkeyup="change(this.id,'errmarital_status','data')" onblur="change(this.id,'errmarital_status','data')" >
                                           
                                            <option value="">Select</option>
                                            <option value="married">Married</option>
                                            <option value="unmarried">Unmarried</option>
                                        </select> </label>
                                         <span id="errmarital_status"></span><br>
                                    <label class="form-control" for="">Birth Date: 
                                        <input autocomplete="off" class="form-control datepickers" type="date" name="employ_date_of_birth" id="employ_date_of_birth" onkeyup="change(this.id,'erremploy_date_of_birth')" onblur="change(this.id,'erremploy_date_of_birth')" ></label>
                                    <span id="erremploy_date_of_birth"></span><br>


                                    <label class="form-control" for="">Photo: <input type="file" name="employmet_picture" id="employmet_picture" onkeyup="change(this.id,'erremploymet_picture')" onblur="change(this.id,'erremploymet_picture')" onchange="readURL(this);">
                                    <img id="preview-image" src="#" alt="your image" /> </label>
                                    <span id="erremploymet_picture"></span><br>
                                    <script type="text/javascript">
                                        function readURL(input) {
                                          if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.readAsDataURL(input.files[0]);

                                            reader.onload = function (e) {
                                                    //Initiate the JavaScript Image object.
                                                    var image = new Image();
                                     
                                                    //Set the Base64 string return from FileReader as source.
                                                    image.src = e.target.result;
                                                           
                                                    //Validate the File Height and Width.
                                                    image.onload = function () {
                                                        var height = this.height;
                                                        var width = this.width;
                                                        if (height > 1200 || width > 800) {
                                                            alert("Height and Width must not exceed 300px.");
                                                            return false;
                                                        }
                                                         $('#preview-image').attr('src', e.target.result).width(100).height(100);
                                                        alert("Uploaded image has valid Height and Width.");
                                                        return true;
                                                    };
                                     
                                                }
                                          }
                                        }
                                    </script>

                                    <input class="form-control" type="text" name="employ_religion" id="employ_religion" placeholder="Employee Religion" onkeyup="change(this.id,'erremploy_religion')" onblur="change(this.id,'erremploy_religion')" >
                                    <span id="erremploy_religion"></span><br>
                                    <input class="form-control" type="text" name="employ_district" id="employ_district" autocomplete="off" placeholder="Employee District" onkeyup="change(this.id,'erremploy_district')" onblur="change(this.id,'erremploy_district')" >
                                    <span id="erremploy_district"></span><br>
                                    <input class="form-control coun" type="text" name="employ_countris" id="employ_countris" placeholder="Employee Countris" onkeyup="change(this.id,'erremploy_countris')" onblur="change(this.id,'erremploy_countris')" >
                                    <span id="erremploy_countris"></span><br>
                                    <input class="form-control" type="text" name="phone" id="phone" placeholder="Employee Phone" onkeyup="change(this.id,'errphone','mobile')" onblur="change(this.id,'errphone','mobile')" >
                                    <span id="errphone"></span><br>
                                    <input class="form-control" type="text" name="employ_postal_code" id="employ_postal_code" placeholder="Employee Postal Code" onkeyup="change(this.id,'erremploy_postal_code')" onblur="change(this.id,'erremploy_postal_code')" >
                                    <span id="erremploy_postal_code"></span><br>
                                    <input class="form-control coun" type="text" name="employ_nationality" id="employ_nationality" placeholder="Employee Nationality" onkeyup="change(this.id,'erremploy_nationality')" onblur="change(this.id,'erremploy_nationality')" >
                                    <span id="erremploy_nationality"></span><br>
                                    <textarea class="form-control" name="present_address" id="present_address" placeholder="Present Address" cols="" rows="" onkeyup="change(this.id,'errpresent_address')" onblur="change(this.id,'errpresent_address')" ></textarea>
                                    <span id="errpresent_address"></span><br>
                                    <textarea class="form-control" name="permanent_address" id="permanent_address" placeholder="Permanent Address" cols="" rows="" onkeyup="change(this.id,'errpermanent_address')" onblur="change(this.id,'errpermanent_address')" ></textarea>
                                    <span id="errpermanent_address"></span><br>
                                    <input class="form-control" type="text" name="employ_nid" id="employ_nid" placeholder="Pasport/NID" onkeyup="change(this.id,'erremploy_nid')" onblur="change(this.id,'erremploy_nid')" >
                                    <span id="erremploy_nid"></span><br>
                                    <input class="form-control" type="text" name="employee_status" id="employee_status" placeholder="Employee Status" onkeyup="change(this.id,'erremployee_status')" onblur="change(this.id,'erremployee_status')" >
                                    <span id="erremployee_status"></span><br>
                                </div>


                            </div>

                        </div>
                        <!-- personal information End -->

                        <div class="col-md-6">
                            <!-- Login information Start -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-info">Login Information</h4>
                                </div>
                                <div class="modal-body">
                                    <input class="form-control" type="text" name="employ_email" class="email" id="useremail" onkeyup="CheckEmail(),change(this.id,'erruseremail')" onchange="CheckEmail()" placeholder="Employee Email"  onblur="change(this.id,'erruseremail')">
                                    <span id="user"></span>
                                    <span id="erruseremail"></span>
                                    <input class="form-control mt-3" type="password" name="employeepass" id="employeepass" placeholder="Employee Password" onkeyup="change(this.id,'erremployeepass')" onblur="change(this.id,'erremployeepass')" >
                                    <span id="erremployeepass"></span>
                                </div>
                            </div>
                            <hr>
                            <!-- Login information  End-->
                            <!-- Company information Start-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-info">Company Details</h4>
                                </div>
                                <div class="modal-body">
                                    <?php 
    
                                                $sql="SELECT employee_type FROM employee_type";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
                                    <select class="form-select" name="employment_id" id="employment_id" onkeyup="change(this.id,'erremployment_id','data')" onblur="change(this.id,'erremployment_id','data')" >
                                       

                                        <option value="">Select Employee Type</option>

                                        <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                                        <option value="<?php echo $row['employee_type'];?>"><?php echo $row['employee_type'];?></option>
                                        <?php
                }
                
                ?>

                                    </select>
                                     <span id="erremployment_id"></span><br>
                                    <?php 
    
                                                $sql="SELECT department_Name FROM department";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
                                    <select class="form-select" name="department_id" id="department_id" onkeyup="change(this.id,'errdepartment_id','data')" onblur="change(this.id,'errdepartment_id','data')" >
                                        

                                        <option value="">Select Department</option>

                                        <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                                        <option value="<?php echo $row['department_Name'];?>"><?php echo $row['department_Name'];?></option>
                                        <?php
                }
                
                ?>

                                    </select>
                                    <span id="errdepartment_id"></span><br>

                                    <?php 
    
                                                $sql="SELECT designation FROM designation";
                                                $query=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query);
            ?>
                                    <select class="form-select" name="designation" id="designation" onkeyup="change(this.id,'errdesignation','data')" onblur="change(this.id,'errdesignation','data')" >
                                       

                                        <option value="">Select Designaton</option>

                                        <?php 
                for($i=1;$i<=$rowcount;$i++){
                    $row=mysqli_fetch_array($query);
                    ?>
                                        <option value="<?php echo $row['designation'];?>"><?php echo $row['designation'];?></option>
                                        <?php
                }
                
                ?>

                                    </select>
                                     <span id="errdesignation"></span><br>


                                    <label for="">Appointment Date:</label>
                                    <input class="form-control datepickers" type="date" name="appointment_date" id="appointment_date" autocomplete="off" placeholder="Select Date" onkeyup="change(this.id,'errappointment_date')" onblur="change(this.id,'errappointment_date')" >
                                    <span id="errappointment_date"></span><br>
                                    <label for="">Joining Date: </label>
                                    <input class="form-control datepickers" type="date" name="joining_date" id="joining_date" autocomplete="off" placeholder="Select Date" onkeyup="change(this.id,'errjoining_date')" onblur="change(this.id,'errjoining_date')" >
                                    <span id="errjoining_date"></span><br>
                                    <?php 
                                    $xyz="SELECT * FROM employee  
                                    ORDER BY employee_id DESC limit 1";
                                    
                                  $zxy=mysqli_query($conn,$xyz);
                                    $x=mysqli_fetch_array($zxy);
                                    $a=$x['employee_code'];
                                    $format="Emp";
                                    $res=substr($a,3);
                                    $result=$format.$res+1;
                                    
                                    ?>
                                    <input class="form-control" type="hidden" name="employee_code" id="" placeholder="Employee Code" value="<?php echo $result?>">
                                    <label>Employee Id:</label>
                                    <input class="form-control" type="text" name="" id="" placeholder="Employee Code" value="<?php echo $result?>"readonly><br>
                                    <label>Created By:</label>
                                    <input class="form-control" type="text" name="created_by" id="created_by" value="<?php echo $_SESSION['full_name']?>"readonly ><br>

                                </div>
                                <div class="modal-footer">
                                    <input class="btn btn-secondary" type="reset" name="reset" id="" value="Reset">
                                    <input class="btn btn-primary" type="submit" name="submit" id="" value="Add Employee">
                                </div>
                            </div>
                            <!-- Company information End -->
                        </div>
                    </div>

                </form>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!--app-->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/index.js"></script>

    <script>
        new PerfectScrollbar(".best-product")
        new PerfectScrollbar(".top-sellers-list")

    </script>

    <script>
        $(function() {
            $(".datepickers").datepicker({
                changeMonth: true,
                changeYear: true,
                 yearRange: "1900:2050",
                dateFormat: 'yy-mm-dd'

            });
        });
        

    </script>
    <script type="text/JavaScript">
       $("#myform").submit(function(){
            var Employ_name= $("#employ_name").val();
            var Gen= $("#gen").val();
            var Marital_status= $("#marital_status").val();
            var Employ_date_of_birth= $("#employ_date_of_birth").val();
            var Employmet_picture= $("#employmet_picture").val();
            var Employ_religion= $("#employ_religion").val();
            var Employ_district= $("#employ_district").val();
            var Employ_countris= $("#employ_countris").val();
            var Phone= $("#phone").val();
            var Employ_postal_code= $("#employ_postal_code").val();
            var Employ_nationality= $("#employ_nationality").val();
            var Present_address= $("#present_address").val();
            var Permanent_address= $("#permanent_address").val();
            var Employ_nid= $("#employ_nid").val();
            var employee_status= $("#employee_status").val();
            var Email= $(".email").val();
            var Employeepass= $("#employeepass").val();
            var Employment_id= $("#employment_id").val();
            var Department_id= $("#department_id").val();
            var Designation= $("#designation").val();
            var Appointment_date= $("#appointment_date").val();
            var Joining_date= $("#joining_date").val();
            //var created_by= $("#created_by").val();
            
            
            if(Employ_name==""){
                $("#employ_name").attr("style","border: 3px solid red");
                $("#erremploy_name").css("color","red");
                $("#erremploy_name").html("Please select your Employee name");
                return false;
            }else{
                $("#employ_name").attr("style","border:");
                $("#erremploy_name").html("");
            }
          if(Gen==""){
                $("#gen").attr("style","border: 3px solid red");
                $("#errgen").css("color","red");
                $("#errgen").html("Please select your gender");
                return false;
            }
           else{
               $("#gen").attr("style","border:");
               $("#errgen").html("");
           }
          if(Marital_status==""){
                $("#marital_status").attr("style","border: 3px solid red");
                $("#errmarital_status").css("color","red");
                $("#errmarital_status").html("Please select your marital status");
                return false;
            }
            else{
                $("#marital_status").attr("style","border:");
                $("#errmarital_status").html("");
            }
            if(Employ_date_of_birth==""){
                $("#employ_date_of_birth").attr("style","border: 3px solid red");
                $("#erremploy_date_of_birth").css("color","red");
                $("#erremploy_date_of_birth").html("Please select your date of birth");
                return false;
            }else{
                $("#employ_date_of_birth").attr("style","border:");
                $("#erremploy_date_of_birth").html("");
            }
          if(Employmet_picture==""){
                $("#employmet_picture").attr("style","border: 3px solid red");
                $("#erremploymet_picture").css("color","red");
                $("#erremploymet_picture").html("Please upload your picture");
                return false;
            }
           else{
               $("#employmet_picture").attr("style","border:");
               $("#erremploymet_picture").html("");
           }
          if(Employ_religion==""){
                $("#employ_religion").attr("style","border: 3px solid red");
                $("#erremploy_religion").css("color","red");
                $("#erremploy_religion").html("Please write your religion");
                return false;
            }
            else{
                $("#employ_religion").attr("style","border:");
                $("#erremploy_religion").html("");
            }
          if(Employ_district==""){
                $("#employ_district").attr("style","border: 3px solid red");
                $("#erremploy_district").css("color","red");
                $("#erremploy_district").html("Please select your district");
                return false;
            }
           else{
               $("#employ_district").attr("style","border:");
               $("#erremploy_district").html("");
           }
         if(Employ_countris==""){
                $("#employ_countris").attr("style","border: 3px solid red");
                $("#erremploy_countris").css("color","red");
                $("#erremploy_countris").html("Please select your country name");
                return false;
            }
            else{
                $("#employ_countris").attr("style","border:");
                $("#erremploy_countris").html("");
            }
          if(Phone==""){
                $("#phone").attr("style","border: 3px solid red");
                $("#errphone").css("color","red");
                $("#errphone").html("Please enter your phone number");
                return false;
            }
           else{
               $("#phone").attr("style","border:");
               $("#errphone").html("");
           }
           
           if(Employ_postal_code==""){
                $("#employ_postal_code").attr("style","border: 3px solid red");
                $("#erremploy_postal_code").css("color","red");
                $("#erremploy_postal_code").html("Please enter postal code");
                return false;
            }else{
                $("#employ_postal_code").attr("style","border:");
                $("#erremploy_postal_code").html("");
            }
          if(Employ_nationality==""){
                $("#employ_nationality").attr("style","border: 3px solid red");
                $("#erremploy_nationality").css("color","red");
                $("#erremploy_nationality").html("Please select enter your nationality");
                return false;
            }
           else{
               $("#employ_nationality").attr("style","border:");
               $("#erremploy_nationality").html("");
           }
          if(Present_address==""){
                $("#present_address").attr("style","border: 3px solid red");
                $("#errpresent_address").css("color","red");
                $("#errpresent_address").html("Please enter your present address");
                return false;
            }
            else{
                $("#present_address").attr("style","border:");
                $("#errpresent_address").html("");
            }
            if(Permanent_address==""){
                $("#permanent_address").attr("style","border: 3px solid red");
                $("#errpermanent_address").css("color","red");
                $("#errpermanent_address").html("Please enter your permanent address");
                return false;
            }else{
                $("#permanent_address").attr("style","border:");
                $("#errpermanent_address").html("");
            }
          if(Employ_nid==""){
                $("#employ_nid").attr("style","border: 3px solid red");
                $("#erremploy_nid").css("color","red");
                $("#erremploy_nid").html("Please enter your nid number");
                return false;
            }
           else{
               $("#employ_nid").attr("style","border:");
               $("#erremploy_nid").html("");
           }
          if(employee_status==""){
                $("#employee_status").attr("style","border: 3px solid red");
                $("#erremployee_status").css("color","red");
                $("#erremployee_status").html("Please select your employee status");
                return false;
            }
            else{
                $("#employee_status").attr("style","border:");
                $("#erremployee_status").html("");
            }
          if(Email==""){
                $(".email").attr("style","border: 3px solid red");
                $("#erruseremail").css("color","red");
                $("#erruseremail").html("Please enter your email address");
                return false;
            }else{
               $(".email").attr("style","border:");
               $("#erruseremail").html("");
           }
          if(Employeepass==""){
                $("#employeepass").attr("style","border: 3px solid red");
                $("#erremployeepass").css("color","red");
                $("#erremployeepass").html("Please enter your password");
                return false;
            }
           else{
               $("#employeepass").attr("style","border:");
               $("#erremployeepass").html("");
           }
         if(Employment_id==""){
                $("#employment_id").attr("style","border: 3px solid red");
                $("#erremployment_id").css("color","red");
                $("#erremployment_id").html("Please select employee");
                return false;
            }
            else{
                $("#employment_id").attr("style","border:");
                $("#erremployment_id").html("");
            }
          if(Department_id==""){
                $("#department_id").attr("style","border: 3px solid red");
                $("#errdepartment_id").css("color","red");
                $("#errdepartment_id").html("Please select your department");
                return false;
            }
           else{
               $("#department_id").attr("style","border:");
               $("#errdepartment_id").html("");
           }
           
           if(Designation==""){
                $("#designation").attr("style","border: 3px solid red");
                $("#errdesignation").css("color","red");
                $("#errdesignation").html("Please select your designation");
                return false;
            }else{
                $("#designation").attr("style","border:");
                $("#errdesignation").html("");
            }
          if(Appointment_date==""){
                $("#appointment_date").attr("style","border: 3px solid red");
                $("#errappointment_date").css("color","red");
                $("#errappointment_date").html("Please select your appointment date");
                return false;
            }
           else{
               $("#appointment_date").attr("style","border:");
               $("#errappointment_date").html("");
           }
          if(Joining_date==""){
                $("#joining_date").attr("style","border: 3px solid red");
                $("#errjoining_date").css("color","red");
                $("#errjoining_date").html("Please select your joining date");
                return false;
            }
            else{
                $("#joining_date").attr("style","border:");
                $("#errjoining_date").html("");
            }
            // if(created_by==""){
            //     $("#created_by").attr("style","border: 3px solid red");
            //     $("#errcreated_by").css("color","red");
            //     $("#errcreated_by").html("Please select your employee status");
            //     return false;
            // }else{
            //     $("#created_by").attr("style","border:");
            //     $("#errcreated_by").html("");
            // }
           
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

<script>
    $(document).ready(function(){
    $('#distc').autocomplete({
        source:'get_distric.php',
        minLength:1,
        delay:500
    })
    
    
})
    
    
    
    </script> 
    
    <script>
    $(document).ready(function(){
    $('.coun').autocomplete({
        source:'getCountry.php',
        minLength:1,
        delay:500
    })
    
    
})
    
    
    
    </script> 


</body>

</html>
