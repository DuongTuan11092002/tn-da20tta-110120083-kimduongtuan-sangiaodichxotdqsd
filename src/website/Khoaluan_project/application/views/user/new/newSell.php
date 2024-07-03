    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <?php
            $this->data['NewListHot'] = $this->indexModel->getNewLimit();
            $this->data['NewSaleCarHot'] = $this->indexModel->selectNewSaleCarHot();
            $this->data['citys'] = $this->cityModel->select();
            $this->load->view('user/template_user/sidebarNew', $this->data);
            ?>


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="container">

                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <form action="<?php echo base_url('tim-kiem-thong-tin-mua-xe') ?>" method="GET">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="keyword" placeholder="tìm kiếm tin mua xe">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-transparent text-primary">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <div class="dropdown ml-4">
                                  
                                    <a href="<?php echo base_url('dang-tin-mua-xe') ?>" class="btn btn-success ml-3 rounded-pill">Đăng tin mua xe</a>
                                </div>


                            </div>
                        </div>
                        <?php
                        foreach ($NewSaleCar_pagination as $key => $value) {
                        ?>
                            <div class="col-lg-12  pb-1 mb-4">
                                <div class="card">
                                    <div class="row d-flex">
                                        <div class="col-lg-4">
                                            <img src="<?php echo base_url('uploads/new/' . $value->thumbnail) ?>" alt="" width="100%">
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card-body">
                                                <div class="mb-2"><?php echo date('d-m-Y', strtotime($value->created_at)); ?></div>
                                                <h3 class="card-title text-uppercase"><?php echo substr($value->name, 0, 100) ?></h3>
                                                <p class="card-text"><?php echo substr($value->description, 0, 100) . '...' ?></p>
                                                <div class="row">
                                                    <div class="col-md-3">

                                                        <a href="mailto:<?php echo $value->emailTK ?>" e class="btn btn-danger rounded-pill">Liên hệ</a>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <span>Người đăng: <?php echo $value->tenTK ?> - <?php echo $value->phoneTK ?> </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3">
                            <?php echo $links ?>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
    </div>
    <!-- Shop End -->