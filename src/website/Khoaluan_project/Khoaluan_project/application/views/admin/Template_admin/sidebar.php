<div class=" page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-category">Chính</li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('quan-tri') ?>">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Trang chủ</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
          <span class="menu-title">Quản lý bản tin</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('category-management') ?>">Quản lý danh mục</a></li>
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('new-sales-management') ?>">Quản lý tin đăng mua</a></li>
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('new-management') ?>">Quản lý tin tức</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-package" aria-expanded="false" aria-controls="ui-basic">
          <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
          <span class="menu-title">Quản lý gói</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-package">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('package-management') ?>">Quản lý gói dịch vụ</a></li>
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('register_package') ?>">Quản lý gói đăng ký</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('product-management') ?>">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Quản lý sản phẩm</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('banner-management') ?>">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Quản lý banner</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('company-management') ?>">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Quản lý hãng xe</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('vehicles-management') ?>">
          <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
          <span class="menu-title">Quản lý dòng xe hơi</i></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('city-management') ?>">
          <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
          <span class="menu-title">Quản lý khu vực tỉnh</span>
        </a>
      </li>


      <!-- info login -->
      <li class="nav-item sidebar-user-actions">
        <div class="user-details">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="d-flex align-items-center">
                <div class="sidebar-profile-img">
                  <img src="<?php echo base_url('assets_admin/images/faces/face28.png') ?>" alt="image">
                </div>
                <div class="sidebar-profile-text">
                  <p class="mb-1"><?php echo $this->session->userdata('account')['fullname'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Settings</span>
          </a>
        </div>
      </li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
            <span class="menu-title">Take Tour</span></a>
        </div>
      </li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="<?php echo base_url('dang-xuat') ?>" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Đăng xuất</span></a>
        </div>
      </li>
    </ul>
  </nav>