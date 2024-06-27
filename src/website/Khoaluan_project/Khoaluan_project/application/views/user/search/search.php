    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <?php
            $this->data['list_companies'] = $this->companyModel->select(); //hãng xe
            $this->data['list_vehicles'] = $this->vehiclesModel->select(); // dòng xe
            $this->data['list_cityes'] = $this->cityModel->select(); //khu vực
            $this->load->view('user/template_user/sidebar', $this->data);
            ?>

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <h3 class=" text-center font-weight-bold text-uppercase">Thông tin tìm kiếm: <?php echo  '<span class=" font-italic text-danger">' . $title . '</span>' ?></h3>
                    </div>
                    <?php
                    foreach ($Search_pagination as $key => $value) {
                    ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4 ">
                                <a href="<?php echo base_url('chi-tiet-san-pham/' . $value->product_id . '/' . $value->product_slug) ?>">

                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <a href="<?php echo base_url('chi-tiet-san-pham/' . $value->product_id . '/' . $value->product_slug) ?>" class=" text-decoration-none">
                                            <img class="img-fluid w-100" src="<?php echo base_url('uploads/product/' . $value->product_thumbnail) ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <div class="row mb-3">
                                            <div class="col-lg-7">
                                                <span>Năm sản xuất:
                                                    <?php echo '<span class=" font-weight-bold">' . $value->manufacture_year . '</span>' ?></span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span>Mã: <?php echo '<span class="">' . $value->code . '</span>' ?></span>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url('chi-tiet-san-pham/' . $value->product_id . '/' . $value->product_slug) ?>" class="text-decoration-none">
                                            <h4 class="text-truncate mb-3 text-uppercase font-weight-bold"><?php echo $value->product_name ?>
                                            </h4>
                                        </a>
                                        <div class="d-flex justify-content-center">
                                            <h6><?php echo number_format($value->product_price) . ' vnđ' ?></h6>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <div class="row m-3">
                                        <div class="col-lg-4">
                                            <a href="<?php echo base_url('chi-tiet-san-pham/' . $value->product_id . '/' . $value->product_slug) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                                        </div>
                                        <div class="col-lg-5">
                                            <p class="">Khu vực: <?php echo $value->tenkhuvuc ?></p>
                                        </div>
                                        <div class="col-lg-3">
                                            <a href="tel:<?php echo $value->phone ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-phone text-primary mr-1"></i>Liên hệ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <?php
                            echo $links;
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->