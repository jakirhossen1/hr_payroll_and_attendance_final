<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">

					<div class="row">
						<div class="col-md-12">
						
							<h3 style="margin:10px;">Employee Documents</h3>
							
						</div>
					</div>
					<hr>

					<div class="row">

						<div class="col-md-3"></div> 
						<div class="col-md-6">
							<?php 

								$sql="SELECT employee_name FROM employee";
								$query=mysqli_query($conn,$sql);
								$rowcount=mysqli_num_rows($query);
								
							?>
							
							<select class="form-select" name="employee" id="employee" onkeyup="change(this.id,'erremployee')" onblur="change(this.id,'erremployee')" >
								<option value="">Select Employee</option>

									<?php 
									
										for($i=1;$i<=$rowcount;$i++){
											$row=mysqli_fetch_array($query);
											
									?>
								<option value="<?php echo $row['employee_name'];?>"><?php echo $row['employee_name'];?></option>
									<?php } ?>
							</select>
							<span id="erremployee"></span>
							
							<input type="text" name="document_name" id="document_name" class="form-control mt-3" placeholder="Document Name" onkeyup="change(this.id,'errdocument_name')" onblur="change(this.id,'errdocument_name')"  >
							<span id="errdocument_name"></span><br>
							
							<select class="form-select" name="document_status" id="document_status" onkeyup="change(this.id,'errdocument_status')" onblur="change(this.id,'errdocument_status')" >
								<option value="">Select Document_Status</option>
								<option value="Valid">Valid</option>
								<option value="Invalid">Invalid</option>
							</select>
							<span id="errdocument_status"></span>
						</div>
						<div class="col-md-3"></div>

					</div>

					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
						
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
					var Document_name= $("#document_name").val();
					var Document_status= $("#document_status").val();
				   
					
					if(Employee==""){
						
						$("#employee").attr("style","border: 3px solid red");
						$("#erremployee").css("color","red");
						$("#erremployee").html("Please select any employee");
						return false;
						
					}else{
						
						$("#employee").attr("style","border:");
						$("#erremployee").html("");
						
					}
					
					
					if(Document_name==""){
						
						$("#document_name").attr("style","border: 3px solid red");
						$("#errdocument_name").css("color","red");
						$("#errdocument_name").html("Please write document name");
						return false;
						
					}else{
						
						$("#document_name").attr("style","border:");
						$("#errdocument_name").html("");
						
					}
					
					
					if(Document_status==""){
					  
						$("#document_status").attr("style","border: 3px solid red");
						$("#errdocument_status").css("color","red");
						$("#errdocument_status").html("Please select your document status");
						return false;
						
					}else{
						
						$("#document_status").attr("style","border:");
						$("#errdocument_status").html("");
					   
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
           

			<?php
				
				if(isset($_POST['submit'])){
					
					$employee=$_POST['employee'];
					$document_name=$_POST['document_name'];
					$document_status=$_POST['document_status'];
					
					$sql="INSERT INTO `employee_document` (`Emlpoyee_id`, `Document_Name`, `Document_Status`) VALUES ('$employee', '$document_name', '$document_status')";
					$querry= mysqli_query($conn, $sql);

					if($querry){
						
					   echo 'Document Added Successfully';
					   
					}else{
						
					   echo 'Document is not  Added!';
					   
					}
				}
			
			?>

<?php include("Footer.php");?>