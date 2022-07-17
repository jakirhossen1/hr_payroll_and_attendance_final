<?php 

	if(isset($_POST['submit'])){
		
		$employee=$_POST['employee'];
		$awarddate=$_POST['awarddate'];
		$EmployeeName=$_POST['EmployeeName'];
		$AwardAmount=$_POST['AwardAmount'];
		$leaves_status=$_POST['leaves_status'];
		$Description=$_POST['Description'];
		$dates=$_POST['dates'];
		 

		$s="SELECT award_date FROM award_list WHERE award_date='$awarddate'";
		$qurey=mysqli_query($conn,$s);
		$num=mysqli_num_rows($qurey);
		
		if($num==1){
			
			echo "Award Already Exits";
			
		}else{
			
			$sql="INSERT INTO `award_list` (`employee_id`, `award_date`, `award_of_name`, `total_amount`, `leave_status`, `description`, `month_year`) VALUES ('$employee', '$awarddate', '$EmployeeName', '$AwardAmount', '$leaves_status', '$Description', '$dates')";
			$qurey=mysqli_query($conn,$sql);
			echo "Award Added!";
			
		}   
	}
	
?>

<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">

						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Add Award List</h3>
								
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
								
								<div class="row">
									<div class="col-md-12">
									
										Award Date<input type="date" class="form-control mt-1 mb-3" name="awarddate" id="awarddate" onkeyup="change(this.id,'errawarddate')" onblur="change(this.id,'errawarddate')" >
										<span id="errawarddate"></span>
										
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="text" class="form-control mt-3 mb-3" name="EmployeeName" id="EmployeeName" placeholder="Award Name" onkeyup="change(this.id,'errEmployeeName')" onblur="change(this.id,'errEmployeeName')" >
										<span id="errEmployeeName"></span>
										
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="number" class="form-control mt-3 mb-3" name="AwardAmount" id="AwardAmount" placeholder="Award Amount" onkeyup="change(this.id,'errAwardAmount')" onblur="change(this.id,'errAwardAmount')" >
										<span id="errAwardAmount"></span>
										
									</div>
								</div>


								<div class="row">
									<div class="col-md-12">
									
										<textarea name="Description" rows="3" id="Description" placeholder="Description" class="form-control mt-3 mb-3" onkeyup="change(this.id,'errDescription')" onblur="change(this.id,'errDescription')" ></textarea>
										<span id="errDescription"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="date" class="form-control mt-3 mb-3" name="dates" id="dates" onkeyup="change(this.id,'errdates')" onblur="change(this.id,'errdates')">
										<span id="errdates"></span>
										
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
									
										<input class="btn btn-primary mt-3 mb-3 bx-pull-right " type="submit" name="submit" id="" value="Save">
										
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
					
					var Employee= $("#employee").val();
					var Awarddate= $("#awarddate").val();
					var EmployeeNames= $("#EmployeeName").val();
					var AwardAmounts= $("#AwardAmount").val();
					var Descriptions= $("#Description").val();
					var Dates= $("#dates").val();
					
					if(Employee==""){
						
						$("#employee").attr("style","border: 3px solid red");
						$("#erremployee").css("color","red");
						$("#erremployee").html("Please select any employee");
						return false;
						
					}else{
						
						$("#employee").attr("style","border:");
						$("#erremployee").html("");
						
					}
					
					
					if(Awarddate==""){
					  
						$("#awarddate").attr("style","border: 3px solid red");
						$("#errawarddate").css("color","red");
						$("#errawarddate").html("Please select award date");
						return false;
						
					}else{
					   
						$("#awarddate").attr("style","border:");
						$("#errawarddate").html("");
					   
					}
					
					
					if(EmployeeNames==""){
						
						$("#EmployeeName").attr("style","border: 3px solid red");
						$("#errEmployeeName").css("color","red");
						$("#errEmployeeName").html("Please write award name");
						return false;
						
					}else{
						
						$("#EmployeeName").attr("style","border:");
						$("#errEmployeeName").html("");
						
					}
					
					
					if(AwardAmounts==""){
						
						$("#AwardAmount").attr("style","border: 3px solid red");
						$("#errAwardAmount").css("color","red");
						$("#errAwardAmount").html("Please write your award amount");
						return false;
						
					}else{
						
						$("#AwardAmount").attr("style","border:");
						$("#errAwardAmount").html("");
						
					}
					
					
					if(Descriptions==""){
						
						$("#Description").attr("style","border: 3px solid red");
						$("#errDescription").css("color","red");
						$("#errDescription").html("Please write your award message");
						return false;
						
					}else{
					   
						$("#Description").attr("style","border:");
						$("#errDescription").html("");
					   
					}
					
					
					if(Dates==""){
					  
						$("#dates").attr("style","border: 3px solid red");
						$("#errdates").css("color","red");
						$("#errdates").html("Please select your award date");
						return false;
						
					}else{
						
						$("#Serial").attr("style","border:");
						$("#errSerial").html("");
						
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