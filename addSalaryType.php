<?php 
  
	if(isset($_POST['submit'])){
		
		$salaryType=$_POST['salaryType'];
		
		$s="SELECT * FROM salary_type WHERE salary_Type='$salaryType'";
		$qurey=mysqli_query($conn,$s);
		$num=mysqli_num_rows($qurey);
		
		if($num==1){
			
			echo "Salary Type Already Exits";
			
		}else{
			
			$sql="INSERT INTO salary_type(salary_Type) VAlues('$salaryType')";
			$qurey=mysqli_query($conn,$sql);
			echo "Salay type Added";
			
			header("location:salaryTypeManage.php");
			
		}   
	}
	
?>


<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">      
						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Add Salary Type</h3>
								
							</div>
						</div><hr>

						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
							
								<input type="text" name="salaryType" id="salaryType" class="form-control mt-3" placeholder="Add Salary Type" onkeyup="change(this.id,'errsalaryType')" onblur="change(this.id,'errsalaryType')" >
								<span id="errsalaryType"></span>
							
							</div>
							
							<div class="col-md-3">
							
								<input type="submit" name="submit" id="" class="btn btn-primary pull-right mt-3" value="Save">
								  
							</div>
						</div>
					</form>
				</div>
			</div>


			<script type="text/JavaScript">
			
				$("#myform").submit(function(){
					
					var SalaryType= $("#salaryType").val();
					
					
					if(SalaryType==""){
						
						$("#salaryType").attr("style","border: 3px solid red");
						$("#errsalaryType").css("color","red");
						$("#errsalaryType").html("Please enter salary type");
						return false;
						
					}else{
						
					   $("#salaryType").attr("style","border:");
					   $("#errsalaryType").html("");
					   
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