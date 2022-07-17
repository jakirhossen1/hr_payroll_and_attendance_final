<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
				<?php
						
						require 'connect.php';
						$Id=$_GET['aid'];
						$sql="SELECT * FROM leave_type WHERE leave_type_id='$Id';";
						$query= mysqli_query($conn,$sql);
						while ($row= mysqli_fetch_array($query)){
							
						
				?>
				<form action="addleavetypeupdatedetails.php" method="post" enctype="multipart/form-data">
				   
					<div class="row">
						<div class="col-md-12">
						
							<h3 style="margin:10px;">Update Leave Type</h3>
							
						</div>
					</div>
					<hr>
				   
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
						
							<input type="hidden" value="<?php echo $row['0'];?>" name="Id" />
							<input class="form-control " type="text" name="leavetype"  value="<?php echo $row['1'];?>">
							
						</div>
						<div class="col-md-4">
						
							<input class="btn btn-primary  " type="submit" name="update"  value="update">
							
						</div>
					</div>
					
				</form>
				
				<?php }?>
				</div>
			</div>

            
<?php include("Footer.php");?>


