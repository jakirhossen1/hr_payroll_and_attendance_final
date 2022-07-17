<?php include("Topbar.php");?>

        	<div class="row">
        		<div class="row-md-12">
        			<div class="panel">
        				<div class="panel-body">
                             <div class="modal-content">
                                <div class="forms-body">
                					<table class="table table-bordered">
										<tr>
											<th>SL</th>
											<th>Employee Name</th>
											<th>Clock In</th>
											<th>Clock Out</th>
										</tr>
										<?php
										  
											include("connect.php");
											
											$n=1;
											$sql=" SELECT `u`.`full_name` as `username`, `u`.`user_id`, `attendance`.`singInTime`,  `attendance`.`singOutTime`  FROM `user_table` as u RIGHT JOIN `attendance` on `attendance`.`employee_id` = `u`.`user_id`  where `u`.`status` != 'inactive' or `attendance`. `singInTime` ='".date('Y-m-d')."'";
											$querry= mysqli_query($conn, $sql);
											
											while ($row= mysqli_fetch_array($querry)) {
												
										?>
                					    <tr>
											<td><?php echo $n++ ?></td>
											<td><?php echo $row['username'] ?></td>
											<td>
												<?php
													if($row['singInTime']){
														
														echo date('d-m-Y h:i a', strtotime($row['singInTime'])); 
													 
													}
												?>
											</td>

											  <td><?php
												if($row['singOutTime']) {
												 echo date('d-m-Y h:i a', strtotime($row['singOutTime'])) ;
												}?></td>
                					      
                					    </tr>
                					    <?php }
										
											$num = mysqli_num_rows($querry);
											if(! $num):
											
                					    ?>

                					    <tr>
                					      
											<td colspan="8"><center>Data not found</center></td>
										  
                					    </tr>

                					    <?php endif ?>
										
                					</table>
                                </div>
                            </div>
        				</div>
        			</div>
        		</div>
        	</div>
       
			<script>
			
				$(document).onload(function(){

				});
				
				function dailyAtten(){
					
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
					
					if(num == 1){
						
						$(".btn-change").html('<input class="btn btn-primary bx-pull-right mt-3" type="submit" name="submit" value="SignOut">');
						
					}else{
						
						$(".btn-change").html('<input class="btn btn-primary bx-pull-right mt-3" type="submit" name="submit" value="SignIn">');
						
					}
				}

			</script>

<?php include("Footer.php");?>
