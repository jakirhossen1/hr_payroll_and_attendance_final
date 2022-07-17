<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
					<?php
					  
						$Id=$_GET['aid'];
						$sql="SELECT * FROM salary_setup WHERE salary_setup_id='$Id'";
						$query= mysqli_query($conn, $sql);
						$num= mysqli_fetch_array($query)
					  
					?>  
                    
                    
                    <form action="salarysetupupdatedetails.php" method="post" enctype="multipart/form-data" id="myform">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="margin:10px;"> Update Salary Setup</h3>
                            </div>
                        </div>
                        <hr>
                        <!-- add salary table start -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input type="hidden" name="id" id="id" value="<?php echo $num['salary_setup_id'];?>">
								
                                <?php 
    
									$sql="SELECT employee_name FROM employee";
									$query=mysqli_query($conn,$sql);
									$rowcount=mysqli_num_rows($query);
									
								?>
                                <select class="form-select" name="empNam" id="empNam" readonly >
                                    <option value=""><?php echo $num['employe_Name'];?></option>
										<?php 
										
											for($i=1;$i<=$rowcount;$i++){
												
												$row=mysqli_fetch_array($query);
												
										?>
                                    <option value="<?php echo $row['employee_name'];?>"><?php echo $row['employee_name'];?></option>
										<?php } ?>
                                </select><br>

                                <?php 
    
									$sql="SELECT salary_Type FROM salary_type";
									$query=mysqli_query($conn,$sql);
									$rowcount=mysqli_num_rows($query);
									
								?>
                                <select class="form-select" name="salaryTyp" id="salaryTyp"  >
                                    <option value="<?php echo $num['salary_types'];?>"><?php echo $num['salary_types'];?></option>
										<?php 
										
											for($i=1;$i<=$rowcount;$i++){
												
												$row=mysqli_fetch_array($query);
												
										?>
                                    <option value="<?php echo $row['salary_Type'];?>"><?php echo $row['salary_Type'];?></option>
										<?php } ?>
                                </select>
								
								<input type="number" name="basicSalary" id="basicSalary" class="form-control mt-3"  value="<?php echo $num['basic_salary'];?>">

								<input type="number" name="medical" id="medical" class="form-control mt-3"  value="<?php echo $num['medical'];?>">

								<input type="number" name="house" id="house" class="form-control mt-3"  value="<?php echo $num['house_rent'];?>">

								<input type="number" name="food" id="food" class="form-control mt-3"  value="<?php echo $num['food'];?>">

								<input type="number" name="provi" id="provi" class="form-control mt-3"  value="<?php echo $num['provident_fund'];?>">

								<input type="submit" name="update" id="" class="btn btn-primary bx-pull-right mt-3" value="Update">
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
                </div>
            </div>
            

<?php include("Footer.php");?>