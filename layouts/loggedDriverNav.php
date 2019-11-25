<section class="menu cid-ruv50guSyY" once="menu" id="menu1-2">
  <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <div class="hamburger">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
          </div>
      </button>
      <div class="menu-logo">
          <div class="navbar-brand">
            <img src="https://img.icons8.com/color/96/000000/carpool.png" style="margin-right:10%;">
              <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="index.php">
                      Students CarPool System</a></span>
          </div>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
            <li style="margin-right:20px;" class="nav-item">
              <a class="nav-link link text-white display-4" href="#" aria-expanded="true">
                <span class="mbri-hearth mbr-iconfont mbr-iconfont-btn"></span>
                Contact Us
              </a>
            </li>
            <li class="nav-item dropdown open">
                  <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                      <span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                      <?php echo $_SESSION['fname']; ?>
                  </a>
                  <div class="dropdown-menu">
                    <a class="text-white dropdown-item display-4" href="driverhistory.php">Driver History</a>
                    <a class="text-white dropdown-item display-4" href="logout.php">LogOut</a>
                  </div>
              </li>
      </div>
  </nav>
</section>
