 <!-- partial -->
 <div class="page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Phần chính</li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('quan-tri-doanh-nghiep') ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Trang chủ</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Quản lý</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('quan-ly-san-pham-doanh-nghiep') ?>">Sản phẩm</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('danh-sach-dang-ky-goi-doanh-nghiep') ?>">danh sách gói đăng ký</a></li>
                </ul>
              </div>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/icons/mdi.html">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">Icons</span>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/forms/basic_elements.html">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Forms</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                <span class="menu-title">Charts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
              </div>
            </li> -->
          
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
                <a href="<?php echo base_url('dang-xuat') ?>" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Đăng xuất</span></a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->