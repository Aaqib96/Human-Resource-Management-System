<head>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
  <!-- <link rel="stylesheet" href="./style/all.css"> -->
  <style>
    .skin-blue .sidebar-menu>li>a:hover{
      /* background-color:rgb(20, 194, 247); */
      background-color:#4680ff;
      transition : 1s;
    }
    .skin-blue .sidebar-menu>li>a:visited{
      /* background-color:rgb(20, 194, 247); */
      background-color:#4680ff;
    }
    /* .sidebar{
    position: fixed;
    } */
  </style>
</head>
<aside class="main-sidebar" style="background-color:rgba(0, 0, 0, 0.733);">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="">
        <!-- <div class="pull-left image">
          <img src="<?php 
          echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div> -->
        <div class="pull-left info">
          <p><?php
          //  echo 
          // // $user['username'];
          // $user['firstname'].' '.$user['lastname']; 
          ?></p>
          <!-- <a><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="background-color:rgba(0, 0, 0, 0.733);">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard fa-beat"></i> <span>Dashboard</span></a></li>
        <li class="header" style="background-color:rgba(0, 0, 0, 0.733);">MANAGE</li>
        
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users fa-beat"></i>
            <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="employee.php"><i class="fa fa-circle-o"></i> Employee List</a></li>
            <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Overtime</a></li>
            <li><a href="cashadvance.php"><i class="fa fa-circle-o"></i> Cash Advance</a></li>
            <li><a href="schedule.php"><i class="fa fa-circle-o"></i> Schedules</a></li>
          </ul>
        </li> -->
        <li><a href="employee.php"><i class="fa fa-users"></i> <span>Employee List</span></a></li>
        <li><a href="employee_import.php"><i class="fa fa-users"></i><span>Import Employee List</span></a></li>
        <li><a href="attendance.php"><i class="fa fa-calendar fa-beat"></i> <span>Attendance</span></a></li>
        <li><a href="attendance_import.php"><i class="fa fa-calendar fa-beat"></i> <span>Import Attendance List</span></a></li>
        <li><a href="position.php"><i class="fa fa-suitcase fa-beat"></i> <span>Designation</span></a></li>
        <li class="header" style="background-color:rgba(0, 0, 0, 0.733);">PRINTABLES</li> 
        <li><a href="schedule.php"><i class="fa fa-clock-o"></i><span>Schedules</span></a></li>
        <li><a href="holiday.php"><i class="fa fa-clock-o"></i><span>Holiday</span></a></li>
        <li><a href="holiday_import.php"><i class="fa fa-clock-o"></i><span>Holiday Import</span></a></li>
        <li><a href="user_added_logs.php"><i class="fa fa-files-o fa-beat"></i> <span>User Added Logs</span></a></li>
        <!-- <li><a href="table_relation.php"><i class="fa fa-files-o fa-beat"></i> <span>Table Relation</span></a></li> -->
        <li><a href="payroll.php"><i class="fa fa-files-o message fa-beat"></i> <span>Payroll</span></a></li>
        <li><a href="loan.php"><i class="fa fa-files-o message fa-beat"></i> <span>Loan</span></a></li>
        <!-- <li><a href="payscale.php"><i class="fa fa-files-o fa-beat"></i> <span>Pay Scale</span></a></li> -->
       
        <!-- <li><a href="schedule_employee.php"><i class="fa fa-clock-o fa-beat"></i> <span>Schedule</span></a></li> -->
        <!-- <li><a href="Biometric Devices.php"><i class="fa-brands fa-nfc-directional fa-beat"></i> <span>&nbsp;&nbsp;Biometric Devices</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- <script>
document.addEventListener('DOMContentLoaded', function() {
    var openModalLink = document.getElementById('openModalLink');
    var modal = document.getElementById('message'); // Change this to your modal's ID

    openModalLink.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the default link behavior (navigating to a new page)

        // Show the modal
        modal.style.display = 'show';
    });

  
});
</script> -->
