<?php 
  
	if(isset($_POST['submit'])){
		
		$month=date("F");
		$employee=$_POST['employee'];
		$date=$_POST['date'];
		$ExpenseDescription=$_POST['ExpenseDescription'];
		$ExpenseAmount=$_POST['ExpenseAmount'];
		
		$s="SELECT expense_description FROM expense_list WHERE expense_description='$ExpenseDescription' && expense_date='$date'";
		$qurey=mysqli_query($conn,$s);
		$num=mysqli_num_rows($qurey);
		
		if($num==1){
			
			echo "Expense Already Exits";
			
		}else{
			
			$sql="INSERT INTO `expense_list` (`employee_id`, `expense_date`, `expense_description`, `amount`,`Month`) VALUES ( '$employee', '$date', '$ExpenseDescription', '$ExpenseAmount','$month')";
			$qurey=mysqli_query($conn,$sql);
			echo "Expense Added!";
			
		}   
	}
	
?>

<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">

						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Add Expense List</h3>
								
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
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="date" name="date" id="dates" class="form-control mt-3 mb-3 " onkeyup="change(this.id,'errdates')" onblur="change(this.id,'errdates')" >
										<span id="errdates"></span>
									
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<textarea  row="3"  name="ExpenseDescription" id="ExpenseDescription" class="form-control mt-3 mb-3 " placeholder="Expense Description" onkeyup="change(this.id,'errExpenseDescription')" onblur="change(this.id,'errExpenseDescription')" ></textarea>
										<span id="errExpenseDescription"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="number" name="ExpenseAmount" id="ExpenseAmount" class="form-control mt-3 mb-3 " placeholder="Expense Amount" onkeyup="change(this.id,'errExpenseAmount')" onblur="change(this.id,'errExpenseAmount')" >
										<span id="errExpenseAmount"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input class="btn btn-primary mt-3 mb-3 bx-pull-right " type="submit" name="submit" id="" value="Submit">
									
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
					var Dates= $("#dates").val();
					var ExpenseDescriptions= $("#ExpenseDescription").val();
					var ExpenseAmounts= $("#ExpenseAmount").val();
					
					if(Employee==""){
						
						$("#employee").attr("style","border: 3px solid red");
						$("#erremployee").css("color","red");
						$("#erremployee").html("Please select any employee");
						return false;
						
					}else{
						
						$("#employee").attr("style","border:");
						$("#erremployee").html("");
						
					}
					
					if(Dates==""){
						
						$("#dates").attr("style","border: 3px solid red");
						$("#errdates").css("color","red");
						$("#errdates").html("Please select your expense date");
						return false;
						
					}else{
						
						$("#dates").attr("style","border:");
						$("#errdates").html("");
						
					}
					
					
					if(ExpenseDescriptions==""){
						
						$("#ExpenseDescription").attr("style","border: 3px solid red");
						$("#errExpenseDescription").css("color","red");
						$("#errExpenseDescription").html("Please write your expense message");
						return false;
						
					}else{
						
						$("#ExpenseDescription").attr("style","border:");
						$("#errExpenseDescription").html("");
						
					}
					
					
					if(ExpenseAmounts==""){
					  
						$("#ExpenseAmount").attr("style","border: 3px solid red");
						$("#errExpenseAmount").css("color","red");
						$("#errExpenseAmount").html("Please enter your expense amount");
						return false;
						
					}else{
						
						$("#ExpenseAmount").attr("style","border:");
						$("#errExpenseAmount").html("");
						
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