<?php 

	if(isset($_POST['submit'])){
		
		$employee=$_POST['employee'];
		$assetcode=$_POST['assetcode'];
		$assetname=$_POST['assetname'];
		$Purchasedate=$_POST['Purchasedate'];
		$inviceno=$_POST['inviceno'];
		$Manufacturee=$_POST['Manufacturee'];
		$Serial=$_POST['Serial']; 
		$Warrenty=$_POST['Warrenty'];
		$SalaryStatus="Paid";   
		
		$s="SELECT asset_code FROM asset WHERE asset_code='$assetcode'";
		$qurey=mysqli_query($conn,$s);
		$num=mysqli_num_rows($qurey);
		
		if($num==1){
			
			echo "Asset Already Exits";
			
		}else{
			
			$sql="INSERT INTO `asset` (`employee_id`, `asset_code`, `asset_name`, `purchase_date`, `inovice_no`, `manufacturer`, `serial`, `product_wrrenty`, `salary_status`) VALUES ( '$employee', '$assetcode', '$assetname', '$Purchasedate', '$inviceno', '$Manufacturee', '$Serial', '$Warrenty', '$SalaryStatus')";
			$qurey=mysqli_query($conn,$sql);
			echo "Asset Added";  
            
		}   
	}
?>

<?php include("Topbar.php");?>
      
			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data" id="myform">
						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Add Asset</h3>
								
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
										<select class="form-select" name="employee" id="employee" onkeyup="change(this.id,'erremploye','data')" onblur="change(this.id,'erremploye','data')">
												

											<option value="">Select Employee</option>

										<?php 
											for($i=1;$i<=$rowcount;$i++){
												
												$row=mysqli_fetch_array($query);
												
										?>
											<option value="<?php echo $row['employee_name'];?>"><?php echo $row['employee_name'];?></option>
										<?php } ?>

										</select>
										<span id="erremploye"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="text" placeholder="Asset Code" class="form-control mt-3 mb-3" name="assetcode" id="assetcode" onkeyup="change(this.id,'errassetcode')" onblur="change(this.id,'errassetcode')">
										<span id="errassetcode"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="text" placeholder="Asset Name" class="form-control mt-3 mb-3" name="assetname" id="assetname" onkeyup="change(this.id,'errassetname')" onblur="change(this.id,'errassetname')">
										<span id="errassetname"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="text" placeholder="Invoce No" class="form-control mt-3 mb-3" name="inviceno" id="inviceno" onkeyup="change(this.id,'errinviceno')" onblur="change(this.id,'errinviceno')">
										<span id="errinviceno"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="text" placeholder="Manufacturee" class="form-control mt-3 mb-3" name="Manufacturee" id="Manufacturee" onkeyup="change(this.id,'errManufacturee')" onblur="change(this.id,'errManufacturee')">
										<span id="errManufacturee"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="text" placeholder="Serial" class="form-control mt-3 mb-3" name="Serial" id="Serial" onkeyup="change(this.id,'errSerial')" onblur="change(this.id,'errSerial')">
										<span id="errSerial"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										Purchase Date: <input class="form-control mt-3 mb-3" type="date" name="Purchasedate" id="Purchasedate" onkeyup="change(this.id,'errPurchasedate')" onblur="change(this.id,'errPurchasedate')">
										<span id="errPurchasedate"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<select class="form-select mt-3 mb-3" name="Warrenty" id="Warrenty" onkeyup="change(this.id,'errWarrenty','data')" onblur="change(this.id,'errWarrenty','data')">
											
											<option  value="" selected>Select Product Warrenty</option>
											<option  value="6 Months">6 Months</option>
											<option  value="1 Year">1 year</option>
											<option  value="2 Year">2 year</option>
											<option  value="3 Year">3 year</option>
										</select>
										<span id="errWarrenty"></span>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<select class="form-select mt-3 mb-3" name="SalaryStatus" id="SalaryStatus" hidden >
											
											<option  value="" selected>Select Salary Status</option>
											<option  value="Paid">Paid</option>
										</select>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
									
										<input type="submit" value="submit" class="btn btn-primary bx-pull-right mt-2 mb-2  " name="submit">
										
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
					var Assetcode= $("#assetcode").val();
					var Assetname= $("#assetname").val();
					var Inviceno= $("#inviceno").val();
					var Manufacturees= $("#Manufacturee").val();
					var Serials= $("#Serial").val();
					var Purchasedates= $("#Purchasedate").val();
					var Warrentys= $("#Warrenty").val();
					var SalaryStatuss= $("#SalaryStatus").val();
					
					
					if(Employee==""){
						
						$("#employee").attr("style","border: 3px solid red");
						$("#erremploye").css("color","red");
						$("#erremploye").html("Please select any employee");
						return false;
						
					}else{
						
						$("#employee").attr("style","border:");
						$("#erremploye").html("");
					}
					
					
					if(Assetcode==""){
						
						$("#assetcode").attr("style","border: 3px solid red");
						$("#errassetcode").css("color","red");
						$("#errassetcode").html("Please write your assetcode ");
						return false;
						
					}else{
						
					   $("#assetcode").attr("style","border:");
					   $("#errassetcode").html("");
					   
					}
				   
				   
					if(Assetname==""){
						
						$("#assetname").attr("style","border: 3px solid red");
						$("#errassetname").css("color","red");
						$("#errassetname").html("Please write your asset name");
						return false;
						
					}else{
						
						$("#assetname").attr("style","border:");
						$("#errassetname").html("");
						
					}
					
					
					if(Inviceno==""){
						
						$("#inviceno").attr("style","border: 3px solid red");
						$("#errinviceno").css("color","red");
						$("#errinviceno").html("Please write your invoice number");
						return false;
						
					}else{
						
						$("#inviceno").attr("style","border:");
						$("#errinviceno").html("");
						
					}
					
					
					if(Manufacturees==""){
						
						$("#Manufacturee").attr("style","border: 3px solid red");
						$("#errManufacturee").css("color","red");
						$("#errManufacturee").html("Please add your manufactures");
						return false;
						
					}else{
						
					   $("#Manufacturee").attr("style","border:");
					   $("#errManufacturee").html("");
					   
					}
					
					
					if(Serials==""){
						$("#Serial").attr("style","border: 3px solid red");
						$("#errSerial").css("color","red");
						$("#errSerial").html("Please write your product serial");
						return false;
						
					}else{
						$("#Serial").attr("style","border:");
						$("#errSerial").html("");
						
					}
					
					
					if(Purchasedates==""){
						
						$("#Purchasedate").attr("style","border: 3px solid red");
						$("#errPurchasedate").css("color","red");
						$("#errPurchasedate").html("Please select  your purchase date");
						return false;
						
					}else{
						
					   $("#Purchasedate").attr("style","border:");
					   $("#errPurchasedate").html("");
					   
					}
					
					
					if(Warrentys==""){
						
						$("#Warrenty").attr("style","border: 3px solid red");
						$("#errWarrenty").css("color","red");
						$("#errWarrenty").html("Please write your warrentty");
						return false;
						
					}else{
						
						$("#Warrenty").attr("style","border:");
						$("#errWarrenty").html("");
						
					}
					
					
					if(SalaryStatuss==""){
						
						$("#SalaryStatus").attr("style","border: 3px solid red");
						$("#errSalaryStatus").css("color","red");
						$("#errSalaryStatus").html("Please select your salary status");
						return false;
						
					}else{
						
					   $("#SalaryStatus").attr("style","border:");
					   $("#errSalaryStatus").html("");
					   
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


<?php include("Topbar.php");?>