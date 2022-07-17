<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <div class="row">
                        <div class="col-md-12">
						
                            <h3 style="margin:10px;">User Manage</h3>
							
                        </div>
                        <hr>
						
                        <div class="row">
                            <div class="col-md-12">
							
                                <a href="addUser.php" class="btn btn-primary bx-pull-right mb-3">Add User</a>
								
                            </div>
                        </div>
						
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Account Creation Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											
												include("connect.php");
											  
												$n=1;
												$sql = "SELECT * FROM user_table";
												$query=mysqli_query($conn,$sql);
											  
												while($row=mysqli_fetch_array($query)){
												  
											?>
									   
											<tr>
												<td><?php echo $n++?></td>
												<td><?php echo $row['full_name']?></td>
												<td><?php echo $row['email']?></td>
												<td><?php echo $row['phone']?></td>
												<td><?php echo $row['status']?></td>
												<td><?php echo $row['account_creation_date']?></td>
												<td>
													<a class="btn btn-danger" href="usermanagedelete.php?aid=<?php echo $row['user_id'];?>">Delete</a>
													<a class="btn btn-success" href="userupdate.php?aid=<?php echo $row['user_id'];?>">Update</a>
												</td>
											</tr>
											<?php } ?>
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include("Footer.php");?>
