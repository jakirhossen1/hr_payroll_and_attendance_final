<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
							
                                <h3 style="margin:10px;">Expense Report</h3>
								
                            </div>
                        </div>
                        <hr>
						
                        <div class="row">
                            <div class="col-md-2"></div> 
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-5">
									
                                        <input class="form-control" type="date" name="start" id="">
										
                                    </div>
									
                                    <div class="col-md-5">
									
                                        <input class="form-control" type="date" name="end" id="">
										
                                    </div>
									
                                    <div class="col-md-2">
									
                                        <input class="btn btn-primary" type="submit" name="report" id="" value="show">
										
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-2"></div> 
                        </div>
                    </form>
                </div>
            </div>
            <hr>

            <div class="modal-content">
                <div class="forms-body" id="printArea">
                    <div class="row">
                        <div class="col-md-12">


                            <?php
							
								if (isset($_POST['report'])){
									
									$start=$_POST['start'];
									$end=$_POST['end'];
									$sl=1;

								   
									echo '<caption><center><h3> Expense Report</h3></center></caption>';
									echo "<hr>";
									echo '<table class="table table-bordered">
											<tr>
												<th>Sl</th>
												<th>Item Name</th>
												<th>Price</th>
											</tr>';
									$sqll = "Select * from expense_list Where  expense_date Between '$start' AND '$end'";
									$qurr = mysqli_query($conn, $sqll);
									
									while ($row = mysqli_fetch_array($qurr)){
										

								?>
								<tr>
									<td><?php echo $sl++; ?></td>
									<td><?php echo $row['expense_description']; ?></td>
									<td><?php echo $row['amount']; ?></td>
								</tr>

                            <?php } ?>
							
                           <?php
						   
								$sqlls = "Select sum(amount) as amt from expense_list Where  expense_date Between '$start' AND '$end'";
								$qurrs = mysqli_query($conn, $sqlls);
								$rows=mysqli_fetch_array($qurrs);
		
								echo '<tr><td style="font-weight:bold; text-align:right;" colspan="2">Total</td><td style="font-weight:bold;">'.$rows['amt'].'</td></tr>';
                            
                            ?>
                            <?php echo "</table>";?>
							
							<div class="inword">
								<p>In words:</p>
								<?php 
								
									echo include("inwordsFunction.php");
									$class_obj = new numbertowordconvertsconver();
									echo $class_obj->convert_number($rows['amt']);
									
								?>
							</div>


                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php 
						
							if (isset($_POST['report'])){
								
								echo  '<button class="btn btn-primary bx-pull-right m-3" onclick=attenPrint()>Print Report</button>' ;
								
							}
                        ?>
                    </div>
                </div>
            </div>
	
			<script>
			
				function attenPrint() {
					
					var body = document.getElementById('body').innerHTML;
					var printArea = document.getElementById('printArea').innerHTML;
					document.getElementById('body').innerHTML = printArea;
					window.print(printArea);
					document.getElementById('body').innerHTML = body;

				}

			</script>

<?php include("Footer.php");?>