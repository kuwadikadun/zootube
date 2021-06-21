<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <!-- <li><a href="/home" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li> -->
        <li><a href="<?= base_url('/user'); ?>" class="<?= ($uri == 'user') ? 'active' : ''; ?>"><i class="lnr lnr-user"></i> <span>User</span></a></li>
        <li><a href="<?= base_url('/user/changepassword'); ?>" class="<?= ($uri == 'changepassword') ? 'active' : ''; ?>"><i class="lnr lnr-lock"></i> <span>Ubah Password</span></a></li>
        <!-- <li><a href="elements.html" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li>
        <li><a href="charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
        <li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
        <li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
        <li>
          <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
          <div id="subPages" class="collapse ">
            <ul class="nav">
              <li><a href="page-profile.html" class="">Profile</a></li>
              <li><a href="page-login.html" class="">Login</a></li>
              <li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
            </ul>
          </div>
        </li>
        <li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
        <li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li> -->
        <li><a href="<?= base_url('auth/logout'); ?>" class="<?= ($uri == 'logout') ? 'active' : ''; ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
      </ul>
    </nav>
  </div>
</div>
<!-- END LEFT SIDEBAR -->