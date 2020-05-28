<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin'); ?>">
  
  <div class="sidebar-brand-text">Eateris</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == null) echo 'active'; ?>">
  <a class="nav-link" href="<?php echo site_url('admin'); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Options
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?php if($this->uri->segment(2) == 'food' || $this->uri->segment(2) == 'food_category' || $this->uri->segment(2) == 'user' || $this->uri->segment(2) == 'edit' || $this->uri->segment(2) == 'add') echo 'active'; ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-table"></i>
    <span>Table Setup</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('admin/food');?>">Food</a>
      <a class="collapse-item" href="<?php echo site_url('admin/food_category');?>">Food Category</a>
      <a class="collapse-item" href="<?php echo site_url('admin/users');?>">Users</a>
    </div>
  </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item <?php if($this->uri->segment(2) == 'statistics') echo 'active'; ?>">
  <a class="nav-link" href="<?php echo site_url('admin/statistics'); ?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>