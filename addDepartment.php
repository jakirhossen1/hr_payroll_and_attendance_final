<?php 

	if(isset($_POST['submit'])){
		
		$department=$_POST['department'];
		$degination=$_POST['degination'];
		
		$s="SELECT * FROM department WHERE department_Name='$department'";
		$result=mysqli_query($conn,$s);
		$num=mysqli_num_rows($result);
		
		if($num==1){
			
			echo "<script> alert('Department Already Exits')</script>";
			
		}else{
			
			$sqls="INSERT INTO department(department_Name)Values('$department')";
			$query=mysqli_query($conn,$sqls);
			
			$sql="INSERT INTO designation(designation)Values('$degination')";
			$query=mysqli_query($conn,$sql);  
			
			header("location:departmentManage.php");
		}
	   
	   
	}


?>

<?php include("Topbar.php");?>
              

			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">
						<div class="row">
							<div class="col-md-12">	
							
								<h3 style="margin:10px;">Add Department</h3>
							
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-md-4">
								<div class="col">
								
									<input type="text" name="department" id="department" class="form-control" placeholder="Department" onkeyup="change(this.id,'errdepartment')" onblur="change(this.id,'errdepartment')" >
									<span id="errdepartment"></span>
									
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="col">
								
									<input type="text" name="degination" id="degination" class="form-control" placeholder="Designation" onkeyup="change(this.id,'errdegination')" onblur="change(this.id,'errdegination')" >
									<span id="errdegination"></span>
									
								</div>
							</div>
							
							<div class="col-md-4">
							
								<input type="submit" name="submit" class="btn btn-primary" value="Save">
								
							</div>
						</div>
					</form>
				</div>
			</div>


			<script type="text/JavaScript">
			
				$("#myform").submit(function(){
					
					var Department= $("#department").val();
					var Degination= $("#degination").val();
					
					
					if(Department==""){
						
						$("#department").attr("style","border: 3px solid red");
						$("#errdepartment").css("color","red");
						$("#errdepartment").html("Please write your department name");
						return false;
						
					}else{
						
						$("#department").attr("style","border:");
						$("#errdepartment").html("");
						
					}
					
					
					if(Degination==""){
						
						$("#degination").attr("style","border: 3px solid red");
						$("#errdegination").css("color","red");
						$("#errdegination").html("Please write your designation name");
						return false;
						
					}else{
						
						$("#degination").attr("style","border:");
						$("#errdegination").html("");
						
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
            
<?php include("Footer.php");?>