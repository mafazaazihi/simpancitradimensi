<?php

use CodeIgniter\I18n\Time;
?>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center bg-light">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
      <a class="navbar-brand brand-logo" href="index.html"><img src="<?= base_url('assets/vendor/src/'); ?>assets/images/ll.svg" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('assets/vendor/src/'); ?>assets/images/sl.svg" alt="logo" /></a>
      <button class="navbar-toggler navbar-toggler align-self-center bg-primary" type="button" data-toggle="minimize">
        <span class="typcn typcn-th-menu"></span>
      </button>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav me-lg-2">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="<?= base_url('assets/vendor/src/'); ?>assets/images/faces/<?= $prof['Image']; ?>" alt="profile" />
          <span class="nav-profile-name"><?= $prof['Fullname']; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="<?= base_url('user/') . $prof['Userid']; ?>">
            <i class="typcn typcn-cog-outline text-primary"></i>
            Settings
          </a>
          <a class="dropdown-item" href="<?= base_url('logout'); ?>">
            <i class="typcn typcn-eject text-primary"></i>
            Logout
          </a>
        </div>
      </li>
      <li class="nav-item nav-user-status dropdown">
        <p class="mb-0">Last login : <?= $prof['Lastlogin']; ?></p>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-date dropdown">
        <a class="nav-link d-flex justify-content-center align-items-center" id="calDropdown" href="#" data-bs-toggle="dropdown">
          <h6 class="date mb-0">Today <?= date('M-j'); ?></h6>
          <i class="typcn typcn-calendar"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list bg-dark" aria-labelledby="calDropdown">
          <p class="mb-0 fw-normal float-start dropdown-header">Calendar</p>
          <div class="calendar"></div>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="typcn typcn-th-menu"></span>
    </button>
  </div>
</nav>
<div class="container-fluid page-body-wrapper">