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

                        <div class="col-lg-12 mb-4">
                            <?php
                            foreach ($NewList_pagination as $key => $value) {
                            ?>
                                <div class="card mb-4">

                                    <div class="row d-flex">
                                        <div class="col-lg-5">
                                            <a href="" class=" text-decoration-nones">
                                                <img src="<?php echo base_url('uploads/new/' . $value->thumbnail) ?>" alt="" width="100%">
                                            </a>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="card-body">
                                                <div class="mb-2"><?php echo date('d-m-Y', strtotime($value->created_at)); ?></div>
                                                <a href="<?php echo base_url('chi-tiet-tin-tuc/' . $value->id . '/' . $value->slug) ?>" class=" text-decoration-nones">
                                                    <h3 class="card-title text-uppercase"><?php echo substr($value->name, 0, 90) ?></h3>
                                                </a>
                                                <p class="card-text"><?php echo substr($value->content, 0, 100) . '...' ?></p>
                                                <a href="<?php echo base_url('chi-tiet-tin-tuc/' . $value->id . '/' . $value->slug) ?>" class=" btn btn-outline-dark text-decoration-none">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
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