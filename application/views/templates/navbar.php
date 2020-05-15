<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Eateris</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2) == 'statistics') echo 'active'; ?>" href="<?php echo site_url('admin/statistics'); ?>">Statistics</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Setup
                </a>
                <div class="dropdown-menu <?php if($this->uri->segment(2) == 'setup') echo 'active'; ?>" aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?php if($this->uri->segment(3) == 'food') echo 'active'; ?>" href="<?php echo site_url('admin/setup/food'); ?>">Food</a>
                <a class="dropdown-item <?php if($this->uri->segment(3) == 'food_category') echo 'active'; ?>" href="<?php echo site_url('admin/setup/food_category'); ?>">Food Category</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </div>
</nav>