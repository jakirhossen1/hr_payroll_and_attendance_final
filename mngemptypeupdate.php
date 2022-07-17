<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<?php 
				  
						require 'connect.php';
						
						$Id=$_GET['aid'];
						$sql="SELECT * FROM employee_type WHERE employee_Type_id='$Id';";
						$query= mysqli_query($conn,$sql);
						
						while ($row= mysqli_fetch_array($query)){
				  
				  
					?>
				  
					<form action="mngemptypeupdatedetails.php" method="post" enctype="multipart/form-data">      
						<div class="row">
							<div class="col-md-12">
								<h3 style="margin:10px;">Update Employee Type</h3>
							</div>
						</div><hr>

					  <div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<input type="hidden" name="Id" value="<?php echo $row['0'];?>" >
							<input type="text" name="employeeType"  class="form-control " value="<?php echo $row['1'];?>">
						
						</div>
						
						<div class="col-md-3">
							<input type="submit" name="update" class="btn btn-primary"  value="Update">
						</div>
					  </div>
					</form>
					<?php }?>
				</div>
			</div>

<?php include("Footer.php");?>
