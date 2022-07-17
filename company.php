<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Add Company</h3>
								
							</div>
						</div>
						<hr>
						
						
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<input type="text" name="company_name" class="form-control mt-2" placeholder="Please enter your company name." required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="text" name="company_address" class="form-control mt-2" placeholder="Please enter your company address." required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="number" name="company_phone" class="form-control mt-2" placeholder="Please enter your phone number." required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="email" name="company_email" class="form-control mt-2" placeholder="Please enter your company email address." required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="file" name="company_logo" class="form-control mt-2" required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="submit" name="submit" class="btn btn-primary bx-pull-right mt-2" value="Submit">
									</div>
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>
					</form>
				</div>
			</div>


			<!--  php insert code-->>

			<?php

				if (isset($_POST['submit'])) {
					
					$company_name = $_POST['company_name'];
					$company_address = $_POST['company_address'];
					$company_phone = $_POST['company_phone'];
					$company_email = $_POST['company_email'];
					$dir='uploads/';
					$path=$dir.basename($_FILES['company_logo']['name']);
					$temp=$_FILES['company_logo']['tmp_name'];
					
					if(move_uploaded_file($temp,$path)){


					}

					$sql = "INSERT INTO company ( Name, Address, phone, email, logo) VALUES ('$company_name','$company_address','$company_phone', '$company_email', '$path')";
					$query = mysqli_query($conn, $sql);

					if ($query){
						echo 'Your company details added successfully';
					}else{
						
						echo 'Your company details is not added.';
						
					}
				}

			?>


<?php include("Footer.php");?>

