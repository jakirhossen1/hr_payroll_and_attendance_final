<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="margin:10px;">My Profile</h3>
                        </div>
                    </div>

                </div>
            </div>
            <hr>


            <div class="col-md-3"></div>
            <div class="modal-content">
                <div class="forms-body">
                    <div class="row">
                        <div class="col-6 col-lg-4 align-items-md-center">
                            <div class="card shadow-sm border-0 overflow-hidden">
                                <div class="card-body">
                                    <div class="profile-avatar text-center">
                                        <?php
										
                                            $user=$_SESSION['userName'];
                                            $sql="SELECT * from employee Where email='$user'";
                                            $query=mysqli_query($conn,$sql);
                                            while($row=mysqli_fetch_array($query)){
												
                                        ?>
                                        <img src="<?php echo $row['picture'];?>" class="rounded-circle shadow" width="120" height="120" alt="">
                                        
                                    </div>
                                    
                                    <div class="d-flex align-items-center justify-content-around mt-5 gap-3"></div>
                                    <div class="text-center mt-4">
                               
                                        <h4 class="mb-1"><?php echo $row['employee_name'];?></h4>
                                        
                                        <p class="mb-0 text-secondary"><?php echo $row['district'].",".$row['Countries'];?></p>
                                        <div class="mt-4"></div>
                                        <h6 class="mb-1"><?php echo $row['department_id']."--".$row['designation_id'];?> </h6>
                                        <p class="mb-0 text-secondary">
                                            <h3>
                                                <?php 

                                                    if($_SESSION['role_id'] == 1){ 
                                                            echo "Super Admin";
                                                        }

                                                    elseif($_SESSION['role_id'] == 2){ 
                                                        echo "Admin";}

                                                    elseif($_SESSION['role_id'] == 3){ 
                                                            echo "HR";
                                                        }

                                                    elseif($_SESSION['role_id'] == 4){ 
                                                            echo "Employee";
                                                        }
                                                ?>
                                            </h3>
                                            
                                        </p>
                                    </div>
                                                <?php }?>
                                <hr>
                                <div class="text-start">
                                    <h5 class="">About</h5>
                                    <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem.
                                </div>
                                
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                                        Followers
                                        <span class="badge bg-primary rounded-pill">95</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        Following
                                        <span class="badge bg-primary rounded-pill">75</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        Templates
                                        <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <div class="col-md-3"></div>
                    </div>
                </div>
            </div>

<?php include("Footer.php");?>