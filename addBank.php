<?php

	require "connect.php";
	
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

<?php include("Topbar.php"); ?>

			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">      
						<div class="row">
							<div class="col-md-12">
							
							  <h3 style="margin:10px;">Bank Details</h3>
							  
							</div>
						</div><hr>
			
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
											
											<?php } ?>
							
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
						
					}else{
						
					   $("#BankName").attr("style","border:");
					   $("#errBankName").html("");
					   
					}
					
					
					if(BranchNames==""){
						
						$("#BranchName").attr("style","border: 3px solid red");
						$("#errBranchName").css("color","red");
						$("#errBranchName").html("Please your branch name");
						return false;
						
					}else{
						
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
						
					}else{
						
					   $("#AccountNo").attr("style","border:");
					   $("#errAccountNo").html("");
					   
				   }
				   
				   
					if(SwiftCodes==""){
						
						$("#SwiftCode").attr("style","border: 3px solid red");
						$("#errSwiftCode").css("color","red");
						$("#errSwiftCode").html("Please write your swiftcode");
						return false;
						
					}else{
						
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
						
						}else{
							
							$("#"+id).attr("style","border:");
							$("#"+msg).html("");
							
						}
					
					}
				   
				 
				}
    
			</script>   
           
<?php include("Footer.php");?>