<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url().'/template/img/logo/logosmk.jpg' ?>">
        </div>
        <div class="sidebar-brand-text mx-3">SMKN 67</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'/'?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>

      <?php if (session('role_id') === '4') {?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-fw fa-users"></i>
          <span>User Management</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Management</h6>
            <a class="collapse-item" href="<?php echo base_url().'/user'; ?>">Users</a>
            <a class="collapse-item" href="<?php echo base_url().'/role';?> ">Roles</a>
          </div>
        </div>
      </li>
    <?php } ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Letters</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Letters</h6>

            <?php if( session('role_id') === '1' || session('role_id') === '4') { ?>
            <a class="collapse-item" href="<?php echo base_url().'/masuk';?>">Input Letters</a>    
            <a class="collapse-item" href="<?php echo base_url().'/surat';?>">Letters Sent</a>
            <a class="collapse-item" href="<?php echo base_url().'/permintaan';?>">Resquest Letters</a>
           <?php } if(session('role_id') === '4') { ?>
            <a class="collapse-item" href="<?php echo base_url().'/backup';?>">Output Letters</a>
           <?php } if( session('role_id') !== '1' ) { ?>
            <a class="collapse-item" href="<?php echo base_url().'/receive';?>">Letters Received </a>
           <?php }?>
          </div>
        </div>
      </li>
  
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
 