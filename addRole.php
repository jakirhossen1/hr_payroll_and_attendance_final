<?php 
  
	if(isset($_POST['submit'])){
		
		$role_name=$_POST['rolename'];
		$permission=$_POST['permission'];
		$user_role_status="Active";
		
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


<?php include("Topbar.php");?>

				<div class="modal-content">
					<div class="forms-body">
						<form action="" method="post" enctype="multipart/form-data" id="myform">
							<div class="row">
								<div class="col-md-12">
							   
									<h3 style="margin:10px;">Add Role</h3>
								   
								</div>
							</div>
							<hr>
						   
							<div class="row"> 
								<div class="col-md-3 ">
								
									<input type="text" class="form-control" name="rolename"  id="rolename" placeholder="Please Write Role Name" onkeyup="change(this.id,'errrolename')" onblur="change(this.id,'errrolename')"  > 
									<span id="errrolename"></span>
									
								</div>
								
								<div class="col-md-4">
								
									<input type="text" class="form-control" name="permission"  id="permission" placeholder="Please Write Some Role Permissions" onkeyup="change(this.id,'errpermission')" onblur="change(this.id,'errpermission')"  > 
									<span id="errpermission"></span>
									
								</div>
								
								<div class="col-md-3">
									<select  name="status" class="form-select" id="status" hidden  >
										<option >Select Your Status</option>
										<option value="Active" >Active</option>
										<option value="Inactive">Inactive</option>
									</select>
									
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
							
						}else{
							
							$("#permission").attr("style","border:");
							$("#errpermission").html("");
						   
						}
					   
					   
						if(Status==""){
							
							$("#status").attr("style","border: 3px solid red");
							$("#errstatus").css("color","red");
							$("#errstatus").html("Please select your user role status");
							return false;
							
						}else{
							
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
            
<?php include("Footer.php");?>