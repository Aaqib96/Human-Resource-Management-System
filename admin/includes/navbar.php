<head>
  <style>
    #slide:hover{
      background-color:rgb(20, 194, 247);
      /* background-color:#4680ff; */
      transition : 1s;
    }
  </style>
</head>
<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo" style="background-color:rgba(0, 0, 0, 0.733);" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>I</b> S</span> -->
      <span class="logo-mini"><img src="../images/image1.png" alt="" style="height:50px; width:50px;"></span>
      <!-- logo for regular state and mobile devices -->
      <!-- <span class="logo-lg"><b>INOVI</b>  Solution</span> -->
      <!-- <span class="logo-lg"><img src="images/INOVI.png" alt=""></span> -->
      <img src="../images/INOVI1.png" alt="" style="height:100px; width:120px;">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <!-- <nav class="navbar navbar-static-top" style="background-color:rgba(0, 0, 0, 0.733);"> -->
    <nav class="navbar navbar-static-top" style="background-color:#4680ff;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="slide">
        <!-- <span class="sr-
        y">Toggle navigation</span> -->
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <div class="pull-right">
                  <a href="logout.php" style="border-radius: 20px; margin-top: 8px; margin-right: 10px;" class="btn btn-default btn-flat">Sign out</a>
                </div>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
            
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                

                <p>
                  
                  <small>Member since <?php echo date('M. Y', strtotime($user['created_on'])); ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
                </div>
                
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'includes/profile_modal.php'; ?>