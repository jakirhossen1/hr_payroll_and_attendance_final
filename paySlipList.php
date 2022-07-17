<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <!--                    <form action="" method="post" enctype="multipart/form-data">-->

                    <div class="row">
                        <div class="col-md-12">
						
                            <h3 style="margin:10px;">Pay Slip List</h3>
							
                        </div>
                    </div>
                    <hr>
					
                    <form action="" method="post">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<select class="form-select" name="year" id="year">
									<?php 
									
										for($i=1900;$i<=date("Y");$i++){
													
									?>
									<option class="form-control" value="<?php echo $i;?>" selected><?php echo $i;?></option>
									<?php }?>
								</select>
							</div>
							
							<div class="col-md-3">
								<select name="month" class=" form-select" id="month" onchange="paySlip()">
									<option value="">Select Month</option>
									<option value="January">January</option>
									<option value="February">February</option>
									<option value="March">March</option>
									<option value="April">April</option>
									<option value="May">May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="August">August</option>
									<option value="September">September</option>
									<option value="October">October</option>
									<option value="November">November</option>
									<option value="December">December</option>
								</select>

							</div>
							<div class="col-md-3"></div>
						</div>
                    </form>
                    
                    
                    <?php 
					
						$_SESSION
                    
                    ?>

                    <!-- <div class="row">
                            <div class="col-md-12">                                
                            </div>
                        </div> -->


                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="modal-content">
                        <div class="forms-body">

                            <table class="table table-striped table-bordered">

                                <thead>
                                    <tr>
                                        <th>S.l</th>
                                        <th>Employee</th>
                                        <th>Salary Year</th>
                                        <th>Salary Month</th>
                                        <th>Salary Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="payslipShow">


                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>


			<script>
			
				function paySlip() {
					
					var year = $('#year').val();
					var Month = $('#month').val();
					$.ajax({
						url: 'getPayslipList.php',
						method: 'POST',
						dataType: 'html',
						data: {
							year: year,
							Month: Month
						},
						success: function(data) {

							$('#payslipShow').html(data);

						}

					})
				}

			</script>

<?php include("Footer.php");?>
