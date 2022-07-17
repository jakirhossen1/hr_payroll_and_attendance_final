<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <?php 
                    
                        $Id=$_GET['aid'];
                        $sql="SELECT * FROM attendance_schedule WHERE Schedule_id='$Id' ";
                        $query= mysqli_query($conn, $sql);
                        
                        while ($row= mysqli_fetch_array($query)){
                    
                    
                    ?>
                    <form action="attendancescheduleupdatedetails.php" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
							
                                <h3 style="margin:10px;">Update Attendance Schedule</h3>
								
                            </div>
                        </div>
                        <hr>
						
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
									
                                        <input type="hidden" name="Id" value="<?php echo $row['Schedule_id'];?>">
                                        Signin Time Setup:<input type="time" name="signin" class="form-control mt-3 mb-3 " value="<?php echo $row['Signin_in_time_setup'];?>">
										
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-12">
									
                                        Signout Time Setup:<input type="time" name="signout" class="form-control mt-3 mb-3 " value="<?php echo $row['Sign_out_time_setup'];?>">
										
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-12">
									
                                        Late Count Time:<input type="time" name="latecount" class="form-control mt-3 mb-3 " value="<?php echo $row['Late_Count_time'];?>">
										
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-12">
									
                                        Absent Time: <input type="time" name="absent" class="form-control mt-3 mb-3 " value="<?php echo $row['Absent_time'];?>">
										
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-12">
									
                                        <input class="btn btn-primary mt-3 mb-3 bx-pull-right " type="submit" name="update"  value="Update">
										
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>


<?php include("Footer.php");?>
