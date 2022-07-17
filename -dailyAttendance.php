<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="margin:10px;">Daily Attendance</h3>
                            </div>
                        </div>
                        <hr>

                        <div class="row">                             
                            <div class="col-md-4"></div>                             
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                       <!--  <?php

                                        // $sql = "SELECT employee_name FROM employee";
                                        // $query = mysqli_query($conn, $sql);
                                        // $rowcount = mysqli_num_rows($query);
                                        // ?>
                                        // <select class="form-select" name="select_employee" id="select_employee" onchange="dailyAtten()">

                                        //     <option value="">Select Employee</option>

                                        //     <?php
                                        // for ($i = 1; $i <= $rowcount; $i++) {
                                        //     $row = mysqli_fetch_array($query);
                                        // ?>
                                        //     <option value="<?php //echo $row['employee_name']; ?>"><?php //echo $row['employee_name']; ?></option>
                                        //     <?php
                                        // }

                                        ?>

                                        </select><br> -->
                                       Employee Name:<input type="text" name="employee_name" class="form-control mt-1 mb-1" value="<?php echo $_SESSION['full_name']?>"  >

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        SignIn Time:<input type="text" name="singin" class="form-control mt-1 mb-1" value="<?php echo date('h:i:s') ?>" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        Attendance Date:<input class="form-control mt-1 mb-1" name="date" value="<?php echo date("Y-m-d");?>" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 btn-change">
                                        <input class="btn btn-primary bx-pull-right mt-3" type="submit" name="submit" value="SignIn">
                                    </div>
                                </div>
                            </div>
                            </div> 

                            <div class="col-md-4"></div>                         </div>
                        </form>
                </div>
            </div>
            <!-- <hr>

            <div class="modal-content line-margin">
                <div class="forms-body">
                    <div class="row ">
                        <div class="col-md-12">


                            <form action="" method="post">
                                <table class="table table-bordered">
                                    <thead>


                                        <tr>
                                            <th>Name</th>
                                            <th>SingIn</th>
                                            <th>Singout</th>
                                            <th>Late count</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody id="dataShow">


                                    </tbody>

                                </table>
                            </form>




                        </div>
                    </div>
                </div>
            </div> -->

            <?php 
			
				if(isset($_POST['submit'])){
					
					@$nam=$_POST['employee_name'];
					$today=date("Y-m-d");
					$In=$_POST['singin'];
					$Out=$_POST['singin'];
					$late=$_POST['date'];
					
					$t="SELECT * FROM attendance Where employee_id='$nam' && attendancedate='$today'";
					$result=mysqli_query($conn, $t);
					$num=mysqli_num_rows($result);
					
					if($num==1){
						
						$sql="UPDATE  `attendance` SET `employee_id` = '$nam',`singOutTime` = '$Out' Where employee_id='$nam' && attendancedate='$today'";
						$q=mysqli_query($conn,$sql);
						echo "<script>alert('Signed Out Successful')</script>";
						
					}else{
						
						$sql="INSERT INTO `attendance` (`employee_id`, `singInTime`, `singOutTime`, `lateCountTime`, `attendaneStatus`, `attendancedate`) VALUES ('$nam', '$In', null, '$late',null, '$today')";
						$q=mysqli_query($conn,$sql);
						echo "<script>alert(' Attendaced Inserted')</script>";
						
					}
				}
            
            ?>


			<script>
			
				$(document).onload(function(){

				});
				
				function dailyAtten() {
					
					var dailyAtt = $('#select_employee').val();
					
					$.ajax({
						url: 'getdailyAttendace.php',
						method: 'POST',
						dataType: 'html',
						data: {
							dailyAtt: dailyAtt
						},
						success: function(data) {
							$('#dataShow').html(data);
						}
					})
				}

				function changeBtn(num){
					if(num == 1)
						$(".btn-change").html('<input class="btn btn-primary bx-pull-right mt-3" type="submit" name="submit" value="SignOut">');
					else
						$(".btn-change").html('<input class="btn btn-primary bx-pull-right mt-3" type="submit" name="submit" value="SignIn">');
				}

			</script>

<?php include("Footer.php");?>