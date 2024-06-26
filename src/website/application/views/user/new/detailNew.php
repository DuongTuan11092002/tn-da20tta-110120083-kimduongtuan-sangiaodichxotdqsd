<div class=" container-fluid pt-5">
    <div class="row">
        <?php
        $this->data['NewListHot'] = $this->indexModel->getNewLimit();
        $this->data['NewSaleCarHot'] = $this->indexModel->selectNewSaleCarHot();
        $this->data['citys'] = $this->cityModel->select();
        $this->load->view('user/template_user/sidebarNew', $this->data);
        ?>
        <div class="col-lg-9">
            <div class="container">

                <h3 class=" text-center font-weight-bold text-uppercase">
                    <?php echo $DetailNewID->name ?>
                </h3>

                <div class="text">
                    <p class="text-black">
                        <?php
                        // Giả sử $content là nội dung HTML được lấy từ cơ sở dữ liệu
                        $content = $DetailNewID->content;

                        // Thay thế thuộc tính width của tất cả các thẻ <img> thành 100%
                        $new_content = str_replace('<img', '<img  class="img-content" style="width:100%; height:500px;" ', $content);

                        // Hiển thị nội dung HTML đã được chỉnh sửa
                        echo $new_content;
                        ?>


                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Bài viết tin tức khác</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php
                    foreach ($RelateNew as $key => $value) {
                    ?>
                        <div class="card product-item border-0">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?php echo base_url('uploads/new/' . $value->thumbnail) ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h5 class="text-truncate font-weight-bold mb-3">
                                    <?php echo substr($value->name, 0, 50) . (strlen($value->name) > 50 ? '...' : '') ?>
                                </h5>
                                <p>
                                    <?php echo substr($value->description, 0, 100) . (strlen($value->description) > 100 ? '...' : '') ?>
                                </p>
                            </div>

                            <div class="card-footer  border text-center">
                                <a href="<?php echo base_url('chi-tiet-tin-tuc/' . $value->id . '/' . $value->slug) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye  mr-1"></i>Xem chi tiết</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
</div>