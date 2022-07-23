<?php 

  // print_r("<pre>");
  // print_r($_SESSION);die();
  
?>


<?php include("Topbar.php");?>

			<?php
			  
				$alert = [];
				
				if (isset($_POST['submit'])) {
				
					$select_employee = $_POST['select_employee'];
					$leave_type = $_POST['leave_type'];
					$leave_start_date = $_POST['leave_start_date'];
					$leave_ends_date = $_POST['leave_ends_date'];
					$description = $_POST['description'];
					$support_document = $_POST['support_document'];
					$leave_status = "Pending";

					$sql = "INSERT INTO leaves ( leave_type_id,employee_id,leave_start_date, leave_end_date, leave_for, supported_document, leave_status) VALUES ('$leave_type','$select_employee','$leave_start_date', '$leave_ends_date', '$description', '$support_document', '$leave_status')";
					$query = mysqli_query($conn, $sql);

					if ($query) {
						
						$alert['success'] = 'Your leave document added successfully';
					  
					} else {
						
						$alert['errors'] = 'Your leave document is not added';
					  
					}
				}

				if($alert) {

					if(isset($alert['success'])){
						
			?>
			
			<div class="alert alert-success">
			
				<?php echo $alert['success'] ;?>
			  
			</div>
			
			<?php } ?>
			
			<?php 
			
				if(isset($alert['errors'])){
				  
			?>
			
			<div class="alert alert-success">
			
				<?php echo $alert['errors'] ;?>
				
			</div>
			<?php }}?>
			
      
			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">
						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Apply Leave</h3>
								
							</div>
						</div>
						<hr>
						
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<?php if($_SESSION['role']['role_name'] == "Admin"): ?>
									<div class="form-group">
										<label>Users</label>
										<?php
										
											$sql = "SELECT * FROM user_table WHERE `email` != '".$_SESSION['userName']."'";
											$query = mysqli_query($conn, $sql);
											$rowcount = mysqli_num_rows($query);
											
										?>
										<select class="form-select" name="select_employee" id="select_employee" onkeyup="change(this.id,'errleave_type')" onblur="change(this.id,'errleave_type')" >
										<option value="">Select user</option>
										<?php
										
											for ($i = 1; $i <= $rowcount; $i++){
												
												$row = mysqli_fetch_array($query);
											
										?>
										<option value="<?php echo $row['full_name']; ?>"><?php echo $row['full_name']; ?></option>
										<?php } ?>
										</select>
									</div>
								<?php else:?>
									<div class="form-group">
										<label>Users</label>
										
										<input type="text" class="form-select" name="select_employee" id="select_employee" value="<?php echo $_SESSION['full_name'];?>" readonly>
									</div>
								<?php endif ?>

								<div class="form-group">
									<label>Leave Type</label>
									<?php

										$sql = "SELECT leave_type FROM leave_type";
										$query = mysqli_query($conn, $sql);
										$rowcount = mysqli_num_rows($query);
										
									?>
									<select class="form-select" name="leave_type" id="leave_type" onkeyup="change(this.id,'errleave_type')" onblur="change(this.id,'errleave_type')" >
									<option value="">Select Leave Type</option>
									<?php
									
										for ($i = 1; $i <= $rowcount; $i++){
											
											$row = mysqli_fetch_array($query);
										
									?>
									<option value="<?php echo $row['leave_type']; ?>"><?php echo $row['leave_type']; ?></option>
									<?php } ?>
									</select>
									<span id="errleave_type"></span>
								</div>

								<div class="form-group">
								
									Leave Start Date
									<input class="form-control mt-1 mb-1 " name="leave_start_date" id="leave_start_date" type="date" onkeyup="change(this.id,'errleave_start_date')" onblur="change(this.id,'errleave_start_date')" >
									<span id="errleave_start_date"></span>
									
								</div>
								
								<div class="form-group">
								
									Leave Ends Date
									<input class="form-control mt-1  " name="leave_ends_date" id="leave_ends_date" type="date" onkeyup="change(this.id,'errleave_ends_date')" onblur="change(this.id,'errleave_ends_date')" >
									<span id="errleave_ends_date"></span>
									
								</div>
								
								<div class="form-group">
								
									<textarea class="form-control mt-3" name="description" id="description" cols="10" rows="2" placeholder="Please enter your message" onkeyup="change(this.id,'errdescription')" onblur="change(this.id,'errdescription')" ></textarea><br>
									<span id="errdescription"></span>
								
								</div>
								
								<div class="form-group">
								<?php

									$sql = "SELECT document_Name FROM employee_document";
									$query = mysqli_query($conn, $sql);
									$rowcount = mysqli_num_rows($query);
									
								?>
								<select class="form-select" name="support_document" id="support_document" onkeyup="change(this.id,'errsupport_document')" onblur="change(this.id,'errsupport_document')" >
								<option value="">Select Support Document</option>
								<?php
								
									for ($i = 1; $i <= $rowcount; $i++){
										
										$row = mysqli_fetch_array($query);
									
								?>
								<option value="<?php echo $row['document_Name']; ?>"><?php echo $row['document_Name']; ?></option>
								<?php } ?>
								</select>
								<span id="errsupport_document"></span>
								</div>

								<div class="form-group">
								<!-- <label class="label">Status</label> -->
									<select class="form-select" hidden>
									
										<option value="">Pending</option>
										
									</select>
									<span id="errsupport_document"></span>
								</div>

								<div class="form-group">
								
									<input class="btn btn-primary bx-pull-right mt-3" type="submit" name="submit" value="Apply">
									
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>
					</form>
				</div>
			</div>


		
  
			<script type="text/JavaScript">
			
				$("#myform").submit(function(){
					
					var Select_employee= $("#select_employee").val();
					var Leave_type= $("#leave_type").val();
					var Leave_start_date= $("#leave_start_date").val();
					var Leave_ends_date= $("#leave_ends_date").val();
					var Description= $("#description").val();
					var Support_document= $("#support_document").val();
					
					if(Select_employee==""){
						
						$("#select_employee").attr("style","border: 3px solid red");
						$("#errselect_employee").css("color","red");
						$("#errselect_employee").html("Please select employee name");
						return false;
						
					}else{
						
						$("#select_employee").attr("style","border:");
						$("#errselect_employee").html("");
						
					}
					
					
					if(Leave_type==""){
						
						$("#leave_type").attr("style","border: 3px solid red");
						$("#errleave_type").css("color","red");
						$("#errleave_type").html("Please select your leave type");
						return false;
						
					}else{
						
						$("#leave_type").attr("style","border:");
						$("#errleave_type").html("");
						
					}
					
					
					if(Leave_start_date==""){
						
						$("#leave_start_date").attr("style","border: 3px solid red");
						$("#errleave_start_date").css("color","red");
						$("#errleave_start_date").html("Please select leave start date");
						return false;
						
					}else{
					   
					   $("#leave_start_date").attr("style","border:");
					   $("#errleave_start_date").html("");
					   
				   }
				   
				   
					if(Leave_ends_date==""){
						
						$("#leave_ends_date").attr("style","border: 3px solid red");
						$("#errleave_ends_date").css("color","red");
						$("#errleave_ends_date").html("Please select leave end date");
						return false;
						
					}else{
						
						$("#leave_ends_date").attr("style","border:");
						$("#errleave_ends_date").html("");
						
					}
					
					
					if(Description==""){
						
						$("#description").attr("style","border: 3px solid red");
						$("#errdescription").css("color","red");
						$("#errdescription").html("Please enter your leave message");
						return false;
						
					}else{
						
						$("#description").attr("style","border:");
						$("#errdescription").html("");
						
					}
					
					
					if(Support_document==""){
						
						$("#support_document").attr("style","border: 3px solid red");
						$("#errsupport_document").css("color","red");
						$("#errsupport_document").html("Please select your support document");
						return false;
						
					}else{
						
						$("#support_document").attr("style","border:");
						$("#errsupport_document").html("");
						
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