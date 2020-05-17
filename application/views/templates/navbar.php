<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">
<a class="navbar-brand" href="<?php $search = null; $sort = null; $fieldFilter = null; ?>">Eateris</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<!-- Topbar Navbar -->
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?php echo base_url(); ?>" method="post">
<input type="hidden" type="text" value="foodName" name="field">
<div class="input-group">
    <div class="input-group-prepend">
    
    </div>

    <input type="text" class="form-control bg-light border-0 small" name="searchInput" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
    <button class="btn btn-primary" type="submit" name="search">
        <i class="fas fa-search fa-sm"></i>
    </button>
    </div>
</div>
</form>
<ul class="navbar-nav ml-auto">


    <!-- Navbar when screen is small -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search" action="<?php echo base_url(); ?>" method="post">
            <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" name="searchInput" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="search">
                <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            </div>

            <input type="hidden" type="text" value="foodName" name="field">
        </form>

    
        </div>
    </li>

  <!-- Nav Item - User Information -->
  <?php if($this->session->userdata('name') != FALSE){?>

    <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, <?php echo $this->session->userdata('name'); ?></span>
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?php echo site_url('restaurant/out'); ?>" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a>
    </div>
  </li>
  <?php }else{?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('register'); ?>" role="button">
            Register
        </a>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('login'); ?>" role="button">
            Login
        </a>
    </li>
  <?php } ?>
</ul>

</nav>
<!-- End of Topbar -->