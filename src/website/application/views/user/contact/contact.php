  <!-- Page Header Start -->
  <div class="container-fluid bg-warning mb-5">
      <div class="d-flex flex-column align-items-center justify-content-center text-black" style="min-height: 300px">
          <h1 class="font-weight-semi-bold text-uppercase mb-3">Liên hệ chúng tôi</h1>
          <div class="d-inline-flex">
              <p class="m-0 "><a href="<?php echo base_url('/') ?>" class=" text-black">Trang chủ</a></p>
              <p class="m-0 px-2">-</p>
              <p class="m-0">liên hệ</p>
          </div>
      </div>
  </div>
  <!-- Page Header End -->


  <!-- Contact Start -->
  <div class="container-fluid pt-5">

      <div class="row px-xl-5">
          <div class="col-lg-7 mb-5">
              <div class="row" style="z-index: 999;">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                      <?php
                        if ($this->session->flashdata('success')) {
                        ?>
                          <span class="alert alert-success"><?php echo $this->session->flashdata('success') ?></span>
                      <?php
                        } else   if ($this->session->flashdata('error')) {
                        ?>
                          <span class="alert alert-success"><?php echo $this->session->flashdata('error') ?></span>

                      <?php
                        }
                        ?>
                  </div>
                  <div class="col-lg-3"></div>
              </div>
              <div class="contact-form">
                  <form action="<?php echo base_url('thong-tin-lien-he') ?>" method="POST">
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="control-group">
                                  <input type="text" name="fullname" class="form-control shadow" placeholder="Tên của bạn " />
                                  <?php echo ' <p class="help-block text-danger">' . form_error('fullname') . '</p>' ?>

                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="control-group">
                                  <input type="text" name="phone" class="form-control shadow" placeholder="Số điện thoại" />
                                  <?php echo ' <p class="help-block text-danger">' . form_error('phone') . '</p>' ?>

                              </div>
                          </div>
                      </div>

                      <div class="control-group">
                          <input type="email" name="email" class="form-control shadow" id="email" placeholder="Email của bạn" />
                          <?php echo ' <p class="help-block text-danger">' . form_error('email') . '</p>' ?>

                      </div>

                      <div class="control-group">
                          <textarea class="form-control shadow" name="message" rows="6" id="message" placeholder="Nội dung"></textarea>
                          <?php echo ' <p class="help-block text-danger">' . form_error('message') . '</p>' ?>

                      </div>
                      <div>
                          <input class="btn btn-warning py-2 px-4" type="submit" value="Gửi thông tin">
                      </div>
                  </form>
              </div>
          </div>
          <div class="col-lg-5 mb-5">
              <div class="d-flex flex-column mb-3">
                  <h5 class="font-weight-semi-bold mb-3">Trụ sở chính:</h5>
                  <p class="mb-2"><i class="fa fa-map-marker-alt text-black mr-3"></i>126, đường Nguyễn Thiện Thành, Phường 5, Trà Vinh, 940000, Việt Nam</p>
                  <p class="mb-2"><i class="fa fa-envelope text-black mr-3"></i>Kim884740@gmail.com</p>
                  <p class="mb-2"><i class="fa fa-phone-alt text-black mr-3"></i>+84 364202648</p>
              </div>
              <div class="d-flex flex-column">
                  <h5 class="font-weight-semi-bold mb-3">Thời gian làm việc:</h5>
                  <p class="mb-2"><i class="bi bi-alarm text-black mr-3"></i></i><span class="">8 A.M đến 23 P.M</span></p>

              </div>
          </div>
      </div>
  </div>
  <!-- Contact End -->