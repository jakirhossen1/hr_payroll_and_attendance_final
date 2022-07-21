<?php 
	
	include("connect.php");
	
	if(isset($_POST['submit'])){
		
		$SelectEmployee=$_POST['SelectEmployee'];
		$dates=$_POST['dates'];
		$expensename=$_POST['expensename'];
		$amount=$_POST['amount'];
		$dir='uploads/';
		$path=$dir.basename($_FILES['documents']['name']);
		$temp=$_FILES['documents']['tmp_name'];
		if(move_uploaded_file($temp,$path)){}
		$status="Pending";
		
		
		$sql="INSERT INTO claims(employee_id,claims_date,type_of_expense,total_amount,documents,claims_status) Values('$SelectEmployee','$dates','$expensename','$amount','$path','$status')";
		$qurey=mysqli_query($conn,$sql);
		echo "Expense Added!";
		header("location:manageclaims.php");
	}
	
?>


<?php include("Topbar.php");?>

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
							<div class="col-md-3"></div>
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
												<?php } ?>
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
									
										<input type="file" name="documents" id="documents" class="form-control mt-3 mb-3 " onkeyup="change(this.id,'errdocuments')" onblur="change(this.id,'errdocuments')" >
										<span id="errdocuments"></span>
										
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-md-12">
										<select class="form-select mt-3 mb-3" name="status" id="claimstatus" onkeyup="change(this.id,'errclaimstatus','Claim')" onblur="change(this.id,'errclaimstatus','Claim')"hidden >
											<option value="Select">Select Claims Status</option>
											<option value="Paid">Pending</option>
											<!-- <option value="Unpaid">Unpaid</option> -->
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
							<div class="col-md-3"></div>
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
					var Documents= $("#documents").val();
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
						
					}else{
					   
						$("#expensename").attr("style","border:");
						$("#errexpensename").html("");
					   
					}
					
					
					if(Amount==""){
					  
						$("#amount").attr("style","border: 3px solid red");
						$("#erramount").css("color","red");
						$("#erramount").html("Please write your claim amount");
						return false;
						
					}else{
						
						$("#amount").attr("style","border:");
						$("#erramount").html("");
						
					}
					
					
					if(Documents==""){
						
						$("#documents").attr("style","border: 3px solid red");
						$("#errdocuments").css("color","red");
						$("#errdocuments").html("Please select claim files");
						return false;
						
					}else{
						
						$("#documents").attr("style","border:");
						$("#errdocuments").html("");
						
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

<?php include("Footer.php");?>