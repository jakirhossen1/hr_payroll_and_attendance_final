<?php
	
	include("connect.php");
	
	if(isset($_POST["submit"])){
		
		$employeeType=$_POST["employeeType"];
		
		$s="SELECT * FROM employee_Type WHERE employee_Type='$employeeType'";
		$qurey=mysqli_query($conn,$s);
		$num=mysqli_num_rows($qurey);
		
		if($num==1){
			
			echo "Employee Type Already Exits";
			
		}else{
			
			$sql="INSERT INTO employee_Type(employee_Type) VAlues('$employeeType')";
			$qurey=mysqli_query($conn,$sql);
			echo "Employee type Added"; 
			
			header("location:employeeTypeManage.php");
			
		}   
	}

?>


<?php include("Topbar.php");?>

			<div class="modal-content">
			  <div class="forms-body">
				<form action="" method="post" enctype="multipart/form-data" id="myform">      
					<div class="row">
						<div class="col-md-12">
						
						  <h3 style="margin:10px;">Add Employee Type</h3>
						  
						</div>
					</div><hr>

					  <div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
						
							<input type="text" name="employeeType" id="employeeType" class="form-control mt-3" onkeyup="change(this.id,'errempltype')" onblur="change(this.id,'errempltype')" placeholder="Add Employee Type">
							<span id="errempltype"> </span>
						
						</div>
						
						<div class="col-md-3">
						
							<input type="submit" name="submit" id="submit" class="btn btn-primary pull-right mt-3" value="Save">
							  
						</div>
					  </div>
				</form>
			  </div>
			</div>

			<script type="text/JavaScript">
			
				$("#myform").submit(function(){
					
					var EmployeeTypeName= $("#employeeType").val();
					
					if(EmployeeTypeName==""){
						
						$("#employeeType").attr("style","border: 3px solid red");
						$("#errempltype").css("color"," red");
						$("#errempltype").html("Please enter your employee type.");
						return false;
						
					}else{
						
						$("#employeeType").attr("style","border:");
						$("#errempltype").html("");
						
					}
				 
				});
				
				function change(id,msg,type=null){
					var get=$("#"+id).val();
					
					if(type==null){
						
						if(get==""){
							
							$("#"+id).attr("style","border: 3px solid red");
							$("#"+msg).css("color"," red");
							$("#"+msg).html("This field  must not be empty.");
							
						}else{
							
							$("#"+id).attr("style","border:");
							$("#"+msg).html("");
							
						}
					
					}
				 
				}
				
			</script>
           
<?php include("Footer.php");?>