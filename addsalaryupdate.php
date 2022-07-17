<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<?php
					
						require 'connect.php';

						$Id=$_GET['aid'];
						$sql="SELECT * FROM salary_type WHERE salary_Type_id='$Id'";
						$query= mysqli_query($conn, $sql);

						while ($row= mysqli_fetch_array($query)){
							

					?>
					<form action="addsalaryupdatedetails.php" method="post" enctype="multipart/form-data">      
						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Update Salary Type</h3>
								
							</div>
						</div><hr>

						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
							
								<input type="hidden" name="Id" value="<?php echo $row['0']?>">    
								<input type="text" name="salaryType" value="<?php echo $row['1']?>" class="form-control mt-3" >
								
							</div>
							
							
							<div class="col-md-3">
							
								<input type="submit" name="update"  class="btn btn-primary pull-right mt-3" value="Update">
								
							</div>
						</div>
					</form>
					<?php } ?>
				</div>
			</div>
            
<?php include("Footer.php");?>