<?php 

	include("connect.php");
	session_start();
	
?>


<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <div class="row">
                        <div class="col-md-12">
						
                            <h3 style="margin:10px;">Password Change</h3>
							
                        </div>
                    </div>
                </div>
            </div>
            <hr>
			
            <?php 
				if(isset($_POST['submit'])){
					
			   
					$oldPass=$_POST['oldpass'];
					$newPass=$_POST['newpass'];
					$confirmPass=$_POST['confirmpass'];
					$user=$_SESSION['userName'];
					$sql="SELECT password FROM user_table Where email='$user'";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($query)){
						
						$dataBasePassword=$row['password'];
									  
					}
					
					if($oldPass==$dataBasePassword){
						
						if($newPass==$confirmPass){
							
							$update="Update user_table SET passwords='$confirmPass' WHERE email='$user'";
							$up=mysqli_query($conn,$update);
							echo "Password Changes";
							
						}else{
							
							echo "New password and Confirm Password Not Match";
							
						}
						
					}else{
						
						echo "Old Password Not Match";
						
					}
				}
				
			?>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="modal-content">
                        <div class="forms-body">
							<form action="#" method="post">
							
								<input class="form-control" type="password" name="oldpass" id="" placeholder="Enter Old Password" required><br>
								
								<input class="form-control" type="password" name="newpass" id="" placeholder="Enter New Password" required><br>
								
								<input class="form-control" type="password" name="confirmpass" id="" placeholder="Enter Confirm Password"><br>
								
								<input class="btn btn-primary bx-pull-right" type="submit" name="submit" id="" value="Change Password">
								
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>

<?php include("Footer.php");?>