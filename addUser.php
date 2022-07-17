<?php

	if(isset($_POST['submit'])){
		
		$username=$_POST['username'];
		$fullname=$_POST['fullname'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$userRole=$_POST['roleId'];
		$accountCreation=date("Y-m-d");
		$status=$_POST['status'];
		
		$s="SELECT * FROM user_table WHERE email='$email'";
		$result=mysqli_query($conn,$s);
		$num=mysqli_num_rows($result);
		
		if($num==1){
			
			echo "Email  Already Exits";
			
		}else{
			
			$sqls="INSERT INTO `user_table` ( `user_name`, `full_name`, `email`, `phone`, `password`, `role_id`, `account_creation_date`, `status`) VALUES ('$username', '$fullname', '$email', '$phone', '$password', '$userRole', '$accountCreation', '$status')";
			$query=mysqli_query($conn,$sqls);
			
			header("location:userManage.php");
			
		}
		
	}	
	
?>



<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">      
						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Add Users</h3>
							  
							</div>
						</div><hr>

						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
									
										<input type="text" name="username" class="form-control mt-3" id="username" placeholder="Please Write Your User Name" onkeyup="change(this.id,'errusername')" onblur="change(this.id,'errusername')" > 
										<span id="errusername"></span><br>
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<?php 
					
											$sql="SELECT role_name FROM user_role";
											$query=mysqli_query($conn,$sql);
											$rowcount=mysqli_num_rows($query);
											
										?>
										<select class="form-select" name="roleId" id="roleId" onkeyup="change(this.id,'errroleId')" onblur="change(this.id,'errroleId')" >
											<option value="">Select Role</option>
											<?php 
											
												for($i=1;$i<=$rowcount;$i++){
													
													$row=mysqli_fetch_array($query);
											?>
											<option value="<?php echo $row['role_name'];?>"><?php echo $row['role_name'];?></option>
											<?php } ?>
										
										</select>
										<span id="errroleId"></span>               
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="text" name="fullname" class="form-control mt-3" id="fullname"  placeholder="Please Write Your Full Name" onkeyup="change(this.id,'errfullname')" onblur="change(this.id,'errfullname')"  > 
										<span id="errfullname"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="number" name="phone" class="form-control mt-3" id="phone" placeholder="Please Write Your Phone Number" onkeyup="change(this.id,'errphone','mobile')" onblur="change(this.id,'errphone','mobile')" > 
										<span id="errphone"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="email" name="email" class="form-control mt-3" id="email" placeholder="Please Write Your Email Address" onkeyup="change(this.id,'erremail')" onblur="change(this.id,'erremail')" > 
										<span id="erremail"></span>
									
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="password" class="form-control mt-3" name="password" id="password" placeholder="Please Write Your Password" onkeyup="change(this.id,'errpassword')" onblur="change(this.id,'errpassword')" > 
										<span id="errpassword"></span>
											
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<select name="status" class="form-select mt-3"id="status" onkeyup="change(this.id,'errstatus')" onblur="change(this.id,'errstatus')" >
											<option value="">Select Your Status</option>
											<option value="active" selected>Active</option>
											<option value="inactive">Inactive</option>
										</select>
										<span id="errstatus"></span>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										 <input class="btn btn-primary mt-3 bx-pull-right " type="submit" name="submit" id="" value="Save">
										 
									</div>
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>
					</form>
				</div>
			</div>


           
           
			<script type="text/JavaScript">

				$("#myform").submit(function(){
					
					var Username= $("#username").val();
					var RoleId= $("#roleId").val();
					var Fullname= $("#fullname").val();
					var Phone= $("#phone").val();
					var Email= $("#email").val();
					var Password= $("#password").val();
					var Status= $("#status").val();
					
					
					if(Username==""){
						
						$("#username").attr("style","border: 3px solid red");
						$("#errusername").css("color","red");
						$("#errusername").html("Please write your user name");
						return false;
						
					}else{
						
						$("#username").attr("style","border:");
						$("#errusername").html("");
						
					}
					
					
					if(RoleId==""){
						
						$("#roleId").attr("style","border: 3px solid red");
						$("#errroleId").css("color","red");
						$("#errroleId").html("Please enter your user roleid");
						return false;
						
					}else{
						
						$("#roleId").attr("style","border:");
						$("#errroleId").html("");
					   
					}
					
					
					if(Fullname==""){
						
						$("#fullname").attr("style","border: 3px solid red");
						$("#errfullname").css("color","red");
						$("#errfullname").html("Please enter your full name");
						return false;
						
					}else{
						
						$("#fullname").attr("style","border:");
						$("#errfullname").html("");
						
					}
					
					
					if(Phone==""){
						
						$("#phone").attr("style","border: 3px solid red");
						$("#errphone").css("color","red");
						$("#errphone").html("Please enter your mobile number");
						return false;
						
					}else{
						
						$("#phone").attr("style","border:");
						$("#errphone").html("");
						
					}
					
					
					if(Email==""){
						
						$("#email").attr("style","border: 3px solid red");
						$("#erremail").css("color","red");
						$("#erremail").html("Please write your user email address");
						return false;
						
					}else{
					   
						$("#email").attr("style","border:");
						$("#erremail").html("");
					   
					}
					
					
					if(Password==""){
						
						$("#password").attr("style","border: 3px solid red");
						$("#errpassword").css("color","red");
						$("#errpassword").html("Please enter your user password");
						return false;
						
					}else{
						
						$("#password").attr("style","border:");
						$("#errpassword").html("");
						
					}
					
					
					if(Status==""){
						
						$("#status").attr("style","border: 3px solid red");
						$("#errstatus").css("color","red");
						$("#errstatus").html("Please select your user status");
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
					
					
					if(type=="mobile"){
						
						if(get==""){
							
							$("#"+id).attr("style","border: 3px solid red");
							$("#"+msg).css("color","red");
							$("#"+msg).html("This field must not be empty!");
							
						}else if(get.length!==11){
							
							$("#"+id).attr("style","border: 3px solid red");
							$("#"+msg).css("color","red");
							$("#"+msg).html("Mobile number must be 11 digit");
							
						}else{
							
							$("#"+id).attr("style","border:");
							$("#"+msg).html("");
							
						}
					
					}
				   
				 
				}
				
			</script>           
           
<?php include("Footer.php");?>