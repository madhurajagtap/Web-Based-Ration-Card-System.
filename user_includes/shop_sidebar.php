<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
  </div>
  <div class="sidebar-brand-text mx-3">Hi,<?php echo $_SESSION['s_name']; ?></div>
  <?php $shop_session_id =  $_SESSION['shop_id']; ?>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="shop_dashboard.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link" href="view_assign_product.php">
    <i class="fas fa-fw fa-table"></i>
    <span>View Assigned Product From Admin</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="assign_product_to_user.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Assign Product To User</span></a>
</li>
<!-- <li class="nav-item">
  <a class="nav-link" href="enventory.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Enventory</span></a>
</li> -->
<li class="nav-item">
  <a class="nav-link" href="view_my_shop_users.php?emp_id=<?php echo $shop_session_id;?>">
    <i class="fas fa-fw fa-table"></i>
    <span>View My Shop Users</span></a>
</li>
<li class="nav-item">

  



<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="shop_profile.php">
    <i class="fas fa-fw fa-table"></i>
    <span>My Profile</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="shop_logout.php">
  <i class="fas fa-fw fa-table"></i>
    <span>Logout</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>