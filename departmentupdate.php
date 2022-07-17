<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">

					<?php

						require "connect.php";

						$Id=$_GET['aid'];
						$sql="SELECT * FROM department WHERE department_Id='$Id';";
						$query= mysqli_query($conn,$sql);
						
						while ($row= mysqli_fetch_array($query)){
							

					?>
					<form action="departmentupdatedetails.php" method="post" enctype="multipart/form-data">

						<div class="row">
							<div class="col-md-12">
								<h3 style="margin:10px;">Update Department</h3>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-md-4">
								<div class="col">
									<input type="hidden" value="<?php echo $row['0'];?>" name="Id" />
									<input type="text" name="department" class="form-control" value="<?php echo $row['1'];?>" >
								</div>
							</div>
							
							<?php
							
								$id=$_GET['aid'];
								$sqls="SELECT * FROM designation WHERE designation_Id='$id';";
								$querys= mysqli_query($conn,$sqls);
								
								while ($row= mysqli_fetch_array($querys)){

							?>
							<div class="col-md-4">
								<div class="col">
									<input type="hidden" value="<?php echo $row['0'];?>" name="id" />
									<input type="text" name="designation" class="form-control" value="<?php echo $row['1'];?>" >
								</div>
							</div> 
							<?php }?>
							<div class="col-md-4">
								<input type="submit" name="update" class="btn btn-primary" value="Update">
							</div>
						</div>
					</form>
					<?php }?>
				</div>
			</div>

<?php include("Footer.php");?>