<?php 

	require "connect.php";
	require "inwordsFunction.php";
	@session_start();
	
?>

<?php include("Topbar.php");?>

            <div class="modal-content" >
                <div class="forms-body" id="myDiv">
                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <?php 
							
								$id=$_GET["aid"];
								$month=$_SESSION['selectMonth'];
								$Year=$_SESSION['selectYear'];

								$idd=$_GET["aid"];
								$sqlssss=" SELECT * FROM employee WHERE employee_name='$idd'";
								$querryssss= mysqli_query($conn, $sqlssss);
								$rows=mysqli_fetch_array($querryssss) ;                       
							
							
							?>
                            <div class="col-md-12">
                                <div class="text-center lh-1 mb-2">
                                    <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip for the month of <?php echo $month." ".$Year;?></span>
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">EMP Code</span> <small class="ms-3"><?php echo $rows['employee_code'];?></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3"><?php echo $rows['employee_name'];?></small> </div>
                                            </div>
                                        </div>
										
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Phone No.</span> <small class="ms-3"><?php echo $rows['phone'];?></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">NOD</span> <small class="ms-3">28</small> </div>
                                            </div>
                                        </div>
										
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">ESI No.</span> <small class="ms-3"></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                               <?php 
                                                $bankSql="SELECT * FROM  bank Where employee_id='$idd'";
                                                $bankQurey=mysqli_query($conn, $bankSql);
                                                $bankresult=mysqli_fetch_array($bankQurey);
                                                
                                                ?>
                                                <div> <span class="fw-bolder">Method of Pay</span> <small class="ms-3"> <?php echo $bankresult['bank_name'];?></small> </div>
                                            </div>
                                        </div>
										
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Designation</span> <small class="ms-3"><?php echo $rows['designation_id'];?></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Ac No.</span> <small class="ms-3"><?php echo $bankresult['account_no'];?></small> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="mt-4 table table-bordered">
                                        <thead class="bg-dark text-white">

                                            <?php 
                        
												$idd=$_GET["aid"];
												$month=$_SESSION['selectMonth'];
												$Year=$_SESSION['selectYear'];
												
												$sqlss=" SELECT * FROM salary Where employe_id='$idd' && salary_year='$Year' && salary_Month='$month'";
												$querryss= mysqli_query($conn, $sqlss);
												$rowss= mysqli_fetch_array($querryss);
												
												$basic=$rowss['basic_salary'];
												$medical=$rowss['medical'];
												$house=$rowss['house_rent'];
												$food=$rowss['food'];
												$provident=$rowss['provident_fund'];
												$totalEng=$basic+$medical+$house+$food;
                                       
                        
											?>
                                            <tr>
                                                <th scope="col">Earnings</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Deductions</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">Basic Salary</td>
                                                <td><?php echo $rowss['basic_salary']; ?></td>
                                                <td>Provident Fund</td>
                                                <td><?php echo $rowss['provident_fund']; ?></td>
                                            </tr>
											
                                            <tr>
                                                <td scope="row">Medical</td>
                                                <td><?php echo $rowss['medical']; ?></td>
                                                <?php 
												
													$idd=$_GET["aid"];
													$month=$_SESSION['selectMonth'];
													$Year=$_SESSION['selectYear'];
													
													$sqlsss=" SELECT * FROM deduction Where employee_id='$idd' && deduction_year='$Year' && month='$month'";
													$querrysss= mysqli_query($conn, $sqlsss);
													$rowsss= mysqli_fetch_array($querrysss);
													
													$absentAmount=$rowsss['amount'];
													$totalDeduction=$provident+$absentAmount;
                                                
                                                ?>
                                                
                                                <td>By Absent</td>
                                                <td><?php echo @$rowsss['amount']; ?></td>
                                            </tr>
											
                                            <tr>
                                                <td scope="row">House Rent</td>
                                                <td><?php echo $rowss['house_rent']; ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
											
                                            <tr>
                                                <td scope="row">Food</td>
                                                <td><?php echo $rowss['food']; ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
								
                                            <tr class="border-top">
                                                <td scope="row" class="fw-bold">Total Income</td>
                                                <td class="fw-bold"><?php echo @$totalEng; ?></td>
                                                <td class="fw-bold">Total Deductions</td>
                                                <td class="fw-bold"><?php echo @$totalDeduction?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-4"> <br> <span class="fw-bold">Net Pay :<?php echo $rowss['net_salary'];?> </span> </div>
                                    <div class="border col-md-8">
                                        <?php
										
											$class_obj = new numbertowordconvertsconver();
											$class_obj->convert_number($rowss['net_salary']);
											
										?>
                                        <div class="d-flex flex-column"> <span>In Words</span> <span><?php echo $class_obj->convert_number($rowss['net_salary'])." "."Taka Only."; ?></span> </div>
                                    </div>
                                </div><br>
								
                                <div class="d-flex justify-content-end">
                                   <?php 
								   
										$sql=" SELECT * FROM company";
                                        $querrys= mysqli_query($conn, $sql);
                                        $row= mysqli_fetch_array($querrys)
                                    
                                    ?>
                                    <div class="d-flex flex-column mt-2"> <span class="fw-bolder"><h5><?php echo $row['Name'];?></h5></span><span class=" mb-2"><img src="FILE777.JPG" style="height:50px; width: 200px;"></span> <span ><h5> Authorised Signature </h5></span> </div>
                                </div>
                            </div>
                            
        
                        </div>
                    </div>
                </div>
				<div class="row">
				 <div class="col-md-5"></div> 
				 <div class="col-md-4">
					 <button class="btn btn-primary" onclick="payslipprint()">Print</button>
				 </div> 
				 <div class="col-md-3"></div> 
				</div>
            </div>

			<script>
			
				function payslipprint(){
					
					var body=document.getElementById('body').innerHTML;
					var mydiv=document.getElementById('myDiv').innerHTML;
					document.getElementById('body').innerHTML=mydiv;
					window.print(mydiv);
					document.getElementById('body').innerHTML=body;
					
				}
			
			
			</script>


<?php include("Footer.php");?>