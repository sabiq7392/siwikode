<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" href="<?= base_url('assets/img/logo-depok.png') ?>">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css?v=<?= time() ?>" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/mixin.css?v=<?= time() ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/table.css?v=<?= time() ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/simple-sidebar.css?v=<?= time() ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/styles-rating.css?v=<?= time() ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/ourContentStyle.css?v=<?= time() ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/ourFormStyle.css?v=<?= time() ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/animation.css?v=<?= time() ?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/40613f3d16.js" crossorigin="anonymous"></script>

  <title><?= $title ?></title>
</head>

<body id="body">
  <!-- Sidebar -->
  <aside class="sidebarWrapper" id="sidebarWrapper">
    <sidebarHeading class="sidebar-heading mb-3">
      <a href="#" title="SIWIKODE">
        <i class="fas fa-location-arrow"></i>
        <span>SIWIKODE</span>
      </a>
    </sidebarHeading>
    <!--------------------->
    <sidebarLink class="sidebar-link">
    <?php if ($user['is_active'] == 1) : ?>
      <?php foreach ($whoCanAccessMenu as $row) : ?>
        <div class="text-left titleOfMenu">
          <?= $row['menu']; ?>
        </div>
        <?php
        $menuId = $row['id'];
        $showUserMenu = $this->important_model->__showUserMenuManagement__($menuId);
        ?>
        <!------ Line ------>
        <?php foreach ($showUserMenu as $row) : ?>
          <div class="menuSidebar">
            <a href="<?= base_url($row['url']); ?>" class="list-group-item" title="<?= $row['title'] ?>">
              <i class="<?= $row['icon'] ?>"></i>
              <span><?= $row['title'] ?></span>
            </a>
          </div>
        <?php endforeach; ?> <!-- showUserMenu -->

        <?php if ($row['menu'] == 'Admin') : ?>
          <div class="menuSidebar">
            <a href="<?= base_url('admin/menu'); ?>" class="list-group-item" title="Menu Management">
              <i class="fas fa-bars"></i>
              <span>Menu Management</span>
            </a>
          </div>
        <?php endif; ?>

        <div class="borderBottom"></div>

      <?php endforeach; ?> <!-- whoCanAccessMenu-->
      <div class="menuSidebar">
        <a href="<?= base_url('auth/logout'); ?>" class="list-group-item" title="Logout">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </div>
    <?php else : ?>
      <div class="text-left titleOfMenu">
        Menu
      </div>
      <div class="menuSidebar">
        <a href="<?= base_url() ?>" class="list-group-item" title="Wisata">
          <i class="far fa-compass"></i>
          <span>Wisata</span>
        </a>
      </div>
      <div class="borderBottom"></div>
      <div class="text-left titleOfMenu">
          Others
      </div>
      <div class="menuSidebar">
        <a href="<?= base_url('home/our_teams') ?>" class="list-group-item" title="Our Teams">
          <i class="fas fa-users"></i>
          <span>Our Teams</span>
        </a>
      </div>
      <div class="borderBottom"></div>
    <?php endif; ?>
    </sidebarLink>
  </aside>
  <button class="btn toggleButtonSidebar" id="toggleButtonSidebar">
    <i id="toggleSidebarIcon" class="fas fa-sort-up"></i>
  </button>
  <!-- sidebar-wrapper -->
  <!-- Page Content -->
  <nav class="navbar navbar-expand-lg" id="navbar">
    <header class="welcome-user">
      <h6>Welcome, <span><?= $user['username'] ?></span></h6>
    </header>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <?php if($user['is_active'] == 1) :?>
        <li class="nav-item userProfile">
          <a class="nav-link ourIcon" href="<?=base_url('home')?>" title="Message">
            <i class="fas fa-home"></i>
          </a>
        </li>
        <!-------------------->
        <li class="nav-item userProfile">
          <a class="nav-link ourIcon" href="#" title="Notification">
            <i class="fas fa-bell"></i>
          </a>
        </li>
        <!-------------------->
        <li class="nav-item navbarDropdown userProfile" id="navbarDropdown" title="Menu">
          <button class="btn buttonNavbarDropdown" id="buttonNavbarDropdown">
            <i id="iconNavbarDropdown" class="fas fa-sort-up"></i>
          </button>

          <menuDropdown class="menuNavbarDropdown" id="menuNavbarDropdown">
            <a href="<?= base_url('user/edit') ?>" class="dropdownItem">
              <iconDropdown class="iconDropdownItem">
                <i class="fas fa-cog"></i>
              </iconDropdown>
              <textDropdown class="textDropdownItem">
                Setting and Edit
              </textDropdown>
            </a>
            <!-------------------->
            <a href="<?= base_url('our_team') ?>" class="dropdownItem">
              <iconDropdown class="iconDropdownItem">
                <i class="fas fa-users"></i>
              </iconDropdown>
              <textDropdown class="textDropdownItem">
                Our Teams
              </textDropdown>
            </a>
            <!-------------------->
            <a href="<?= base_url('auth/logout') ?>" class="dropdownItem" id="buttonLogout">
              <iconDropdown class="iconDropdownItem">
                <i class="fas fa-sign-out-alt"></i>
              </iconDropdown>
              <textDropdown class="textDropdownItem">
                Logout
              </textDropdown>
            </a>
          </menuDropdown>
        </li>
        <!-------------------->
        <li class="nav-item userProfile">
          <a class="ourImage" href="<?= base_url('user') ?>" title="Profile">
            <img class="" src="<?= base_url('assets/img/photo_profile/'.$user['image'])?>" alt="<?= $user['username'] ?>">
          </a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a href="<?= base_url('auth/signup') ?>" class="btn myButton">Register</a>
        </li>
        <!-------------------->
        <li class="nav-item">
          <a href="<?= base_url('auth/signin') ?>" class="btn myButtonSecondary">Login</a>
        </li>
        <?php endif;?>
      </ul>
    </div>
  </nav>
  <div class="page-content-wrapper" id="page-content-wrapper">
