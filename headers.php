<?php require "connect.php";
@session_start();
if(!isset($_SESSION['userName'])){
  header("location:Login.php");  
}
?>

    <nav class="navbar navbar-expand">
          <div class="mobile-toggle-icon d-xl-none">
              <i class="bi bi-list"></i>
            </div>
            <div class="top-navbar d-none d-xl-block">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item">
              <a class="nav-link" href="Desboard.php">Dashboard</a>
              </li>
            </ul>
            </div>
            <div class="search-toggle-icon d-xl-none ms-auto">
              <i class="bi bi-search"></i>
            
            </div>
            <form class="searchbar d-none d-xl-flex ms-auto">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                <input class="form-control" type="text" placeholder="Type here to search">
                <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i class="bi bi-x-lg"></i></div>
            </form>
            <div class="top-navbar-right ms-3">
              <ul class="navbar-nav align-items-center">
              <li class="nav-item">
                <form method="post" enctype="multipart/form-data">
                  <?php
                    include "connect.php";

                    $nam = $_SESSION['user_id'];
                    $today = date("Y-m-d");

                    $user= $_SESSION['userName'];
                    $sql = "SELECT * FROM attendance Where employee_id = '$nam' and attendancedate = '$today'";
                    $query=mysqli_query($conn,$sql);


                    $row=mysqli_fetch_array($query);

                    $sql2 = "SELECT * FROM attendance Where employee_id = '$nam' and singInTime IS NOT NULL and  singOutTime IS NOT NULL ";
                    $query2=mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_array($query2);
                    if($row):
                      if(! $row2):
                  ?>
                    <button type="submit" class="btn btn-primary" name="clockind_submit">Clock Out</button></li>
                  <?php endif ?>
                <?php else:?>
                  <button type="submit" class="btn btn-primary" name="clockind_submit">Clock In</button></li>
                <?php endif ?>

                </form>
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="user-setting d-flex align-items-center gap-1">
                    <?php
                      include "connect.php";
                      $user= $_SESSION['userName'];
                      $sql="SELECT * from employee Where email='$user'";
                      $query=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_array($query)){
                    ?>
                   <img src="<?php echo $row['picture'];?>" class="user-img" alt="">
                 
                    <div class="user-name d-none d-sm-block"><?php echo $row['employee_name'];?></div>
                   
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                          <img src="<?php echo $row['picture'];?>" alt="" class="rounded-circle" width="60" height="60">
                          <div class="ms-3">
                            <h6 class="mb-0 dropdown-user-name"><?php echo $row['employee_name'];?></h6>
                            <small class="mb-0 dropdown-user-designation text-secondary"><?php echo isset($row['designation_id']) ? $row['designation_id'] : "";?></small>
                          </div>
                       </div>
                     </a>
                   </li>
                    <?php }?>
                   <li><hr class="dropdown-divider"></li>
                   <li>
                      <a class="dropdown-item" href="profile.php">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                           <div class="setting-text ms-3"><span>Profile</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="changePassword.php">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-gear-fill"></i></div>
                           <div class="setting-text ms-3"><span>Setting</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="Desboard.php">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-speedometer"></i></div>
                           <div class="setting-text ms-3"><span>Dashboard</span></div>
                         </div>
                       </a>
                    </li>
                   
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <a class="dropdown-item" href="logOut.php">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                           <div class="setting-text ms-3"><span>Logout</span></div>
                         </div>
                       </a>
                    </li>
                </ul>
              </li>
              </ul>
              </div>
    </nav>


    <?php 
      if(isset($_POST['clockind_submit'])){
           $nam = $_SESSION['user_id'];
           $today = date("Y-m-d");
           $In= date("Y-m-d H:i:s");
           $Out= date("Y-m-d H:i:s");

          $t="SELECT * FROM attendance Where employee_id = '$nam' && attendancedate = '$today'";
          $result = mysqli_query($conn, $t);
          $num = mysqli_num_rows($result);
          if($num==1){
              $sql="UPDATE  `attendance` SET `employee_id` = '$nam',`singOutTime` = '$Out' Where employee_id='$nam' && attendancedate='$today'";
              $q=mysqli_query($conn,$sql);
              header("Location:dailyAttendance.php");
          }else{
              $sql="INSERT INTO `attendance` (`employee_id`, `singInTime`, `lateCountTime`, `attendaneStatus`, `attendancedate`) VALUES ('$nam', '$In' , null ,null, '$today')";
              $q=mysqli_query($conn,$sql);
              
              header("location:dailyAttendance.php");
          }
      }
    
    ?>

    