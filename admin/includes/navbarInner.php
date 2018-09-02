<nav class="navbar navbar-default navbar-fixed-side">
  <div class="container-fluid navForeground">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
          <a class="navbar-brand" id="UserAvatar">

          </a>
          <div class="welcomeUser">
            <h4>Welcome,</h4>
            <h3><?php echo $_SESSION['nickname']?></h3>
          </div>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="navbar-main" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li><a href="../index.php" class="<?php if($currentPage =='Dashboard'){echo 'active';}?>"><i class="fa fa-tachometer"></i><span class="textLink">Dashboard</span></a></li>
              <li><a href="../users.php" class="<?php if($currentPage =='Students'){echo 'active';}?>"><i class="fa fa-users"></i><span class="textLink">Students</span></a></li>
              <li><a href="../uploads.php" class="<?php if($currentPage =='Uploads'){echo 'active';}?>"><i class="fa fa-upload"></i><span class="textLink">Uploads</span></a></li>
              <li><a href="../schedule.php" class="<?php if($currentPage =='Schedule'){echo 'active';}?>"><i class="fa fa-calendar"></i><span class="textLink">Schedule</span></a></li>
              <li><a href="#" class="<?php if($currentPage =='Account'){echo 'active';}?>"><i class="fa fa-cog"></i><span class="textLink">Account</span></a></li>
              <li><a href="#" class="<?php if($currentPage =='Logout'){echo 'active';}?>" id="btnLogout"><i class="fa fa-power-off"></i><span class="textLink">Logout</span></a></li>
          </ul>
      </div>
      <div class="navbar-footer">
        <img src="../../resources/LogoNamePNG.png" alt="Hady Logo" class="img-responsive">
      </div>
  </div>
</nav>
