<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <form action="" method="post" enctype="multipart/form-data" id="myform">
                        <div class="row">
                            <div class="col-md-12">
							
                                <h3 style="margin:10px;">Salary Setup</h3>
								
                            </div>
                        </div>
                        <hr>
                        <!-- add salary table start -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
							
                                <?php 
    
									$sql="SELECT employee_name FROM employee";
									$query=mysqli_query($conn,$sql);
									$rowcount=mysqli_num_rows($query);
									
								?>
                                <select class="form-select" name="empNam" id="empNam" onkeyup="change(this.id,'errempNam')" onblur="change(this.id,'errempNam')" >                                   
                                    <option value="">Select Employee</option>
                                    <?php 
										for($i=1;$i<=$rowcount;$i++){
											
											$row=mysqli_fetch_array($query);
											
									?>
                                    <option value="<?php echo $row['employee_name'];?>"><?php echo $row['employee_name'];?></option>
                                    <?php } ?>

                                </select>
                                <span id="errempNam"></span><br>

                                <?php 
    
									$sql="SELECT salary_Type FROM salary_type";
									$query=mysqli_query($conn,$sql);
									$rowcount=mysqli_num_rows($query);
									
								?>
                                <select class="form-select" name="salaryTyp" id="salaryTyp" onkeyup="change(this.id,'errsalaryTyp')" onblur="change(this.id,'errsalaryTyp')" >                                  
                                    <option value="">Select Selary Type</option>
                                    <?php 
										for($i=1;$i<=$rowcount;$i++){
											
											$row=mysqli_fetch_array($query);
											
									?>
                                    <option value="<?php echo $row['salary_Type'];?>"><?php echo $row['salary_Type'];?></option>
                                    <?php } ?>
                                </select>
                                <span id="errsalaryTyp"></span> 
								
								
                                <input type="number" name="basicSalary" id="basicSalary" class="form-control mt-3" placeholder="Basic Salary" onkeyup="change(this.id,'errbasicSalary')" onblur="change(this.id,'errbasicSalary')" >
                                <span id="errbasicSalary"></span>
								
                                <input type="number" name="medical" id="medical" class="form-control mt-3" placeholder="Medical" onkeyup="change(this.id,'errmedical')" onblur="change(this.id,'errmedical')" >
                                <span id="errmedical"></span>
								
                                <input type="number" name="house" id="house" class="form-control mt-3" placeholder="House Rent" onkeyup="change(this.id,'errhouse')" onblur="change(this.id,'errhouse')" >
                                <span id="errhouse"></span>
								
                                <input type="number" name="food" id="food" class="form-control mt-3" placeholder="Food" onkeyup="change(this.id,'errfood')" onblur="change(this.id,'errfood')" >
                                <span id="errfood"></span>
								
                                <input type="number" name="provi" id="provi" class="form-control mt-3" placeholder="Provident Fund" onkeyup="change(this.id,'errprovi')" onblur="change(this.id,'errprovi')" >
                                <span id="errprovi"></span>
								
                                <input type="submit" name="submit" id="" class="btn btn-primary bx-pull-right mt-3" value="Save"  >
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
                </div>
            </div>
            
			<script type="text/JavaScript">
			
				$("#myform").submit(function(){
					
					var EmpNam= $("#empNam").val();
					var SalaryTyp= $("#salaryTyp").val();
					var BasicSalary= $("#basicSalary").val();
					var Medical= $("#medical").val();
					var House= $("#house").val();
					var Food= $("#food").val();
					var Provi= $("#provi").val();
					
					if(EmpNam==""){
						
						$("#empNam").attr("style","border: 3px solid red");
						$("#errempNam").css("color","red");
						$("#errempNam").html("Please select any employee name");
						return false;
						
					}else{
						
						$("#empNam").attr("style","border:");
						$("#errempNam").html("");
						
					}
					
					
					if(SalaryTyp==""){
						
						$("#salaryTyp").attr("style","border: 3px solid red");
						$("#errsalaryTyp").css("color","red");
						$("#errsalaryTyp").html("Please enter employee salary type");
						return false;
						
					}else{
						
						$("#salaryTyp").attr("style","border:");
						$("#errsalaryTyp").html("");
						
					}
					
					
					if(BasicSalary==""){
						
						$("#basicSalary").attr("style","border: 3px solid red");
						$("#errbasicSalary").css("color","red");
						$("#errbasicSalary").html("Please enter basic salary of an employee");
						return false;
						
					}else{
						
						$("#basicSalary").attr("style","border:");
						$("#errbasicSalary").html("");
					   
					}
				   
				   
					if(Medical==""){
						
						$("#medical").attr("style","border: 3px solid red");
						$("#errmedical").css("color","red");
						$("#errmedical").html("Please enter percentage of medical allowrance");
						return false;
						
					}else{
						
						$("#medical").attr("style","border:");
						$("#errmedical").html("");
						
					}
					
					
					if(House==""){
					 
						$("#house").attr("style","border: 3px solid red");
						$("#errhouse").css("color","red");
						$("#errhouse").html("Please enter percentage of house allowrance");
						return false;
						
					}else{
						
						$("#house").attr("style","border:");
						$("#errhouse").html("");
						
					}
					
					
					if(Food==""){
						
						$("#food").attr("style","border: 3px solid red");
						$("#errfood").css("color","red");
						$("#errfood").html("Please enter percentage of food allowrance");
						return false;
						
					}else{
						
						$("#food").attr("style","border:");
						$("#errfood").html("");
						
					}
					
					
					if(Provi==""){
					  
						$("#provi").attr("style","border: 3px solid red");
						$("#errprovi").css("color","red");
						$("#errprovi").html("Please enter provident percentange");
						return false;
						
					}else{
					   
					   $("#provi").attr("style","border:");
					   $("#errprovi").html("");
					   
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
            
 
            <?php
				if(isset($_POST['submit'])){
					
					$name=$_POST['empNam'];
					$salaryType=$_POST['salaryTyp'];
					$basicSalary=$_POST['basicSalary'];
					$medical=$_POST['medical'];
					$house=$_POST['house'];
					$food=$_POST['food'];
					$provident=$_POST['provi'];
					$s="SELECT * FROM salary_setup WHERE employe_Name='$name'";
					$result=mysqli_query($conn,$s);
					$num=mysqli_num_rows($result);
					
					if($num==1){
						
						echo "<script>alert('Already Salary setup')</script>";
						
					}else{
						
						$sql=  " INSERT INTO `salary_setup` (`salary_types`, `employe_Name`, `basic_salary`, `medical`, `house_rent`, `food`, `provident_fund`) VALUES ('$salaryType', '$name', '$basicSalary', '$medical', '$house', '$food', '$provident')";
						$res=mysqli_query($conn,$sql);
						echo "<script>alert('Salary setuped')</script>";
						
					}
					
				}
            
              
            ?>

<?php include("Footer.php");?>