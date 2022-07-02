    <!--start sidebar -->
    <div class="sidebar-header">
            <div>
              <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">HR PAYROLL</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
            </div>
          </div>
          <!--navigation-->
           <!-- Start Super Admin Role-->
            <?php if ($_SESSION['role_id'] == 1) : ?>
            <ul class="metismenu" id="menu">
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Emlopyee Management</div>
              </a>
              <ul>
                <li> <a href="addEmployee.php"><i class="bi bi-arrow-right-short"></i>Add Employee</a>
                </li>
                <li> <a href="employeeManage.php"><i class="bi bi-arrow-right-short"></i>Manage Employee</a>
                </li>
                <li> <a href="employeeDocument.php"><i class="bi bi-arrow-right-short"></i>Employee Document</a>
                </li>
                <li> <a href="AddEmployeeType.php"><i class="bi bi-arrow-right-short"></i> Add Employee type</a>
                </li>
                <li> <a href="employeeTypeManage.php"><i class="bi bi-arrow-right-short"></i> Manage Employee type</a>
                </li>
                <li> <a href="AwardList.php"><i class="bi bi-arrow-right-short"></i>Employee Award</a>
                </li>
                <li> <a href="claims.php"><i class="bi bi-arrow-right-short"></i>Claims</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid"></i>
                </div>
                <div class="menu-title">Department Management</div>
              </a>
              <ul>
                <li> <a href="addDepartment.php"><i class="bi bi-arrow-right-short"></i>Add Department</a>
                </li>
                <li> <a href="departmentManage.php"><i class="bi bi-arrow-right-short"></i>Manage Department</a>
                </li>
                
              </ul>
            </li>
            
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-award"></i>
                </div>
                <div class="menu-title">Attendance Managment</div>
              </a>
              <ul>
                <li> <a href="dailyAttendance.php"><i class="bi bi-arrow-right-short"></i>Daily Attendance</a>
                </li>
                <li> <a href="attendanceSchedule.php"><i class="bi bi-arrow-right-short"></i>Attendance Schedule</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bag-check"></i>
                </div>
                <div class="menu-title">Leave Management</div>
              </a>
              <ul>
                <li> <a href="addLeave.php"><i class="bi bi-arrow-right-short"></i>Add Leave</a>
                </li>
                <li> <a href="leaveManage.php"><i class="bi bi-arrow-right-short"></i>Manage Leave</a>
                </li>
                <li> <a href="addLeaveType.php"><i class="bi bi-arrow-right-short"></i>Add Leave Type</a>
                </li>
                <li> <a href="leaveTypeManage.php"><i class="bi bi-arrow-right-short"></i>Manage Leave type</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-bookmark-star"></i>
                </div>
                <div class="menu-title">Payroll Management</div>
              </a>
              <ul>
                <li> <a href="createPaySlip.php"><i class="bi bi-arrow-right-short"></i>Create Pay Slip</a>
                </li>
                <li> <a href="paySlipList.php"><i class="bi bi-arrow-right-short"></i>Pay Slip List</a>
                <li> <a href="payslipmanage.php"><i class="bi bi-arrow-right-short"></i>Manage PaySlip</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-cloud-arrow-down"></i>
                </div>
                <div class="menu-title">Salary Management</div>
              </a>
              <ul>
                <li> <a href="addSalary.php"><i class="bi bi-arrow-right-short"></i>Salary Setup</a>
                </li>
                <li> <a href="addSalaryType.php"><i class="bi bi-arrow-right-short"></i>Add Salary Type</a>
                </li>
                <li> <a href="salaryTypeManage.php"><i class="bi bi-arrow-right-short"></i>Salary Type Manage</a>
                </li>
                
              </ul>
            </li>
             <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-cloud-arrow-down"></i>
                </div>
                <div class="menu-title">Report Management</div>
              </a>
              <ul>
                <li> <a href="attendanceReport.php"><i class="bi bi-arrow-right-short"></i>Attendence Report</a>
                </li>
                <li> <a href="salaryReport.php"><i class="bi bi-arrow-right-short"></i>Salary Report</a>
                </li>
                <li> <a href="payslipReport.php"><i class="bi bi-arrow-right-short"></i>Payroll Report</a>
                </li>
                <li> <a href="expenseReport.php"><i class="bi bi-arrow-right-short"></i>Expense Report</a>
                </li>
                <li> <a href="claimReport.php"><i class="bi bi-arrow-right-short"></i>Claim Report</a>
                </li>
                
              </ul>
            </li>
            
            <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-lock"></i>
                </div>
                <div class="menu-title">User Management</div>
              </a>
              <ul>
                <li> <a href="addUser.php"><i class="bi bi-arrow-right-short"></i>Add User</a>
                </li>
                <li> <a href="userManage.php"><i class="bi bi-arrow-right-short"></i>Manage User</a>
                </li>
                <li> <a href="addRole.php"><i class="bi bi-arrow-right-short"></i>User Role</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-file-earmark-spreadsheet"></i>
                </div>
                <div class="menu-title">Finace Details</div>
              </a>
              <ul>
                <li> <a href="addBank.php"><i class="bi bi-arrow-right-short"></i>Add Bank Details </a>
                </li>
                <li> <a href="Asset.php"><i class="bi bi-arrow-right-short"></i>Add Asset </a>
                </li>
                <li> <a href="Addition.php"><i class="bi bi-arrow-right-short"></i>Add Addition </a>
                </li>
                <li> <a href="deduction.php"><i class="bi bi-arrow-right-short"></i>Add Deduction </a>
                </li>
                 <li> <a href="expenseList.php"><i class="bi bi-arrow-right-short"></i>Expense List </a>
                </li>
             
                
              </ul>
            </li>
           
           
            <li>
              <a href="#">
                <div class="parent-icon"><i class="bi bi-exclamation-triangle"></i>
                </div>
                <div class="menu-title">FAQ</div>
              </a>
            </li>
        
           
            <li>
              <a href="#" target="_blank">
                <div class="parent-icon"><i class="bi bi-file-earmark-code"></i>
                </div>
                <div class="menu-title">Documentation</div>
              </a>
            </li>
            <li>
              <a href="message.php">
                <div class="parent-icon"><i class="bi bi-headset"></i>
                </div>
                <div class="menu-title">Support</div>
              </a>
            </li>
          </ul>
          <!--End Super Admin Role-->

        <!--Start Admin Role -->
        <?php elseif ($_SESSION['role_id'] == 2) : ?>
        <ul class="metismenu" id="menu">      
          <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Emlopyee Management</div>
              </a>
              <ul>
                <li> <a href="addEmployee.php"><i class="bi bi-arrow-right-short"></i>Add Employee</a>
                </li>
                <li> <a href="employeeManage.php"><i class="bi bi-arrow-right-short"></i>Manage Employee</a>
                </li>
                <li> <a href="employeeDocument.php"><i class="bi bi-arrow-right-short"></i>Employee Document</a>
                </li>
                <li> <a href="AddEmployeeType.php"><i class="bi bi-arrow-right-short"></i> Add Employee type</a>
                </li>
                <li> <a href="employeeTypeManage.php"><i class="bi bi-arrow-right-short"></i> Manage Employee type</a>
                </li>
                <li> <a href="AwardList.php"><i class="bi bi-arrow-right-short"></i>Employee Award</a>
                </li>
                <li> <a href="claims.php"><i class="bi bi-arrow-right-short"></i>Claims</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid"></i>
                </div>
                <div class="menu-title">Department Management</div>
              </a>
              <ul>
                <li> <a href="addDepartment.php"><i class="bi bi-arrow-right-short"></i>Add Department</a>
                </li>
                <li> <a href="departmentManage.php"><i class="bi bi-arrow-right-short"></i>Manage Department</a>
                </li>
                
              </ul>
            </li>
            <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-lock"></i>
                </div>
                <div class="menu-title">User Management</div>
              </a>
              <ul>
                <li> <a href="addUser.php"><i class="bi bi-arrow-right-short"></i>Add User</a>
                </li>
                <li> <a href="userManage.php"><i class="bi bi-arrow-right-short"></i>Manage User</a>
                </li>
                <li> <a href="addRole.php"><i class="bi bi-arrow-right-short"></i>User Role</a>
                </li>
              </ul>
            </li>
        </ul>

      <!--End Admin Role -->


      <!-- Start HR Role -->

       <?php elseif ($_SESSION['role_id'] == 3) : ?>
        <ul class="metismenu" id="menu">
          <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-award"></i>
                </div>
                <div class="menu-title">Attendance Managment</div>
              </a>
              <ul>
                <li> <a href="dailyAttendance.php"><i class="bi bi-arrow-right-short"></i>Daily Attendance</a>
                </li>
                <li> <a href="attendanceSchedule.php"><i class="bi bi-arrow-right-short"></i>Attendance Schedule</a>
                </li>
              </ul>
            </li>
          <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bag-check"></i>
                </div>
                <div class="menu-title">Leave Management</div>
              </a>
              <ul>
                <li> <a href="addLeave.php"><i class="bi bi-arrow-right-short"></i>Add Leave</a>
                </li>
                <li> <a href="leaveManage.php"><i class="bi bi-arrow-right-short"></i>Manage Leave</a>
                </li>
                <li> <a href="addLeaveType.php"><i class="bi bi-arrow-right-short"></i>Add Leave Type</a>
                </li>
                <li> <a href="leaveTypeManage.php"><i class="bi bi-arrow-right-short"></i>Manage Leave type</a>
                </li>
              </ul>
            </li>
          <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-bookmark-star"></i>
                </div>
                <div class="menu-title">Payroll Management</div>
              </a>
              <ul>
                <li> <a href="createPaySlip.php"><i class="bi bi-arrow-right-short"></i>Create Pay Slip</a>
                </li>
                <li> <a href="paySlipList.php"><i class="bi bi-arrow-right-short"></i>Pay Slip List 1</a>
                <li> <a href="payslipmanage.php"><i class="bi bi-arrow-right-short"></i>Manage PaySlip</a>
                </li>
              </ul>
            </li>
          <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-cloud-arrow-down"></i>
                </div>
                <div class="menu-title">Salary Management</div>
              </a>
              <ul>
                <li> <a href="addSalary.php"><i class="bi bi-arrow-right-short"></i>Salary Setup</a>
                </li>
                <li> <a href="addSalaryType.php"><i class="bi bi-arrow-right-short"></i>Add Salary Type</a>
                </li>
                <li> <a href="salaryTypeManage.php"><i class="bi bi-arrow-right-short"></i>Salary Type Manage</a>
                </li>
                
              </ul>
            </li>
          <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-cloud-arrow-down"></i>
                </div>
                <div class="menu-title">Report Management</div>
              </a>
              <ul>
                <li> <a href="attendanceReport.php"><i class="bi bi-arrow-right-short"></i>Attendence Report</a>
                </li>
                <li> <a href="salaryReport.php"><i class="bi bi-arrow-right-short"></i>Salary Report</a>
                </li>
                <li> <a href="payslipReport.php"><i class="bi bi-arrow-right-short"></i>Payroll Report</a>
                </li>
                <li> <a href="expenseReport.php"><i class="bi bi-arrow-right-short"></i>Expense Report</a>
                </li>
                <li> <a href="claimReport.php"><i class="bi bi-arrow-right-short"></i>Claim Report</a>
                </li>
                
              </ul>
            </li>
          <li>
              <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-file-earmark-spreadsheet"></i>
                </div>
                <div class="menu-title">Finace Details</div>
              </a>
              <ul>
                <li> <a href="addBank.php"><i class="bi bi-arrow-right-short"></i>Add Bank Details </a>
                </li>
                <li> <a href="Asset.php"><i class="bi bi-arrow-right-short"></i>Add Asset </a>
                </li>
                <li> <a href="Addition.php"><i class="bi bi-arrow-right-short"></i>Add Addition </a>
                </li>
                <li> <a href="deduction.php"><i class="bi bi-arrow-right-short"></i>Add Deduction </a>
                </li>
                 <li> <a href="expenseList.php"><i class="bi bi-arrow-right-short"></i>Expense List </a>
                </li>
             
                
              </ul>
            </li>
        </ul>

      <!-- End HR Role -->

      <!-- Start Employee Role -->

      <?php elseif($_SESSION['role_id'] == 4) : ?>
        <ul class="metismenu" id="menu">
          <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Emlopyee</div>
            </a>
            <ul>
               <li> <a href="dailyAttendance.php"><i class="bi bi-arrow-right-short"></i>Employee Attendance</a></li>
              <li> <a href="addLeave.php"><i class="bi bi-arrow-right-short"></i>Apply Leave</a></li>

              <?php if($_SESSION['role_id'] != 4) : ?>
                <li><a href="addLeaveType.php"><i class="bi bi-arrow-right-short"></i>Add Leave Type</a></li>
              <?php endif; ?>

              <li> <a href="claims.php"><i class="bi bi-arrow-right-short"></i>Claims</a> </li>
            </ul>
          </li>
        </ul>

      <!-- End Employee Role -->
      <?php endif; ?>
            
    <!--end navigation-->

    <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->
