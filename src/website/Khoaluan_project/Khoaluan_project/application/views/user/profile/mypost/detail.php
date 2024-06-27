<div class="container">
    <div class="row flex-lg-nowrap" >
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <h3 class="text-center text-uppercase mb-4">Thông tin bài đăng</h3>
                    <form>
                        <div class=" row mt-4">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label for="" style="color:#333; font-style:italic;">Tên dòng xe: </label>
                                    <input type="text" value="<?php echo $postID->product_name ?>" class=" form-control  shadow" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="" style="color:#333; font-style:italic;">Trạng thái: </label>
                                    <select name="" id="" class=" form-control form-control-lg shadow-lg rounded-pill">
                                        <?php
                                        if ($postID->product_status == 0) {
                                        ?>
                                            <option value="" selected>Chưa duyệt</option>
                                        <?php
                                        } else if ($postID->product_status == 1) {
                                        ?>
                                            <option value="" selected>Đã duyệt</option>
                                        <?php
                                        } else if ($postID->product_status == 2) {
                                        ?>
                                            <option value="" selected>Nổi bật</option>
                                        <?php
                                        } else if ($postID->product_status == 3) {
                                        ?>
                                            <option value="" selected>Đã hết hạn</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex">
                                <div class="mb-3 mr-5">
                                    <label for="" style="color:#333; font-style:italic;">Hãng xe hơi: </label>
                                    <input type="text" value="<?php echo $postID->tenHX ?>" id=" " class="form-control shadow" readonly>
                                </div>

                                <div class="mb-3 mr-5">
                                    <label for="" style="color:#333; font-style:italic;">Dòng phân khúc xe hơi: </label>
                                    <input type="text" value="<?php echo $postID->tenDX ?>" id=" " class="form-control shadow" readonly>
                                </div>

                                <div class="mb-3 mr-5">
                                    <label for="" style="color:#333; font-style:italic;">Khu vực (tỉnh): </label>
                                    <input type="text" value="<?php echo $postID->tenTP ?>" id=" " class="form-control shadow" readonly>

                                </div>

                                <div class="mb-3 mr-5 ">
                                    <label for="" style="color:#333; font-style:italic;">Đơn giá(VND): </label>
                                    <input type="text" value="<?php echo number_format($postID->product_price) . 'VNĐ' ?>" class=" form-control form-control-lg w-100 shadow d-flex" readonly>


                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" style="color:#333; font-style:italic;">Năm sản xuất: </label>
                                            <input type="number" value="<?php echo $postID->manufacture_year ?>" id="" class="w-50 form-control form-control-lg shadow" readonly>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 mr-5">
                                            <label for="" style="color:#333; font-style:italic;">Loại hộp số: </label>
                                            <select name="type_gearbox" id="" class=" form-control shadow w-100 rounded-pill">
                                                <?php
                                                if ($postID->type_gearbox == 1) {
                                                ?>
                                                    <option value="1" selected>Hộp số tự động</option>
                                                <?php
                                                } else if ($postID->type_gearbox == 2) {
                                                ?>
                                                    <option value="2" selected>Hộp số sàn</option>
                                                <?php
                                                } else if ($postID->type_gearbox == 3) {
                                                ?>
                                                    <option value="3" selected>Hộp số CVT</option>
                                                <?php
                                                } else if ($postID->type_gearbox == 4) {
                                                ?>
                                                    <option value="4" selected>Hộp số DVT</option>
                                                <?php
                                                } else if ($postID->type_gearbox == 5) {
                                                ?>
                                                    <option value="5" selected>Khác</option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" style="color:#333; font-style:italic;">Mô tả: </label>
                                    <textarea name="product_content" id="" cols="8" rows="5" class=" form-control form-control-lg shadow-lg" readonly><?php echo $postID->product_content ?></textarea>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" style="color:#333; font-style:italic;">Hình ảnh: </label>
                                    <img src="<?php echo base_url('uploads/product/' . $postID->product_thumbnail) ?>" alt="" width="200px">
                                </div>

                                <div class="mb-3">
                                    <label for="" style="color:#333; font-style:italic;">Hình ảnh chi tiết: </label>
                                    <div class="row">
                                        <?php
                                        foreach ($selectIMGLibrary as $key => $value) {
                                        ?>
                                            <div class="col-sm-4">
                                                <img src="<?php echo base_url('uploads/product/' . $value->img_car) ?>" alt="" width="100px">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>




                    </form>
                </div>

                <div class="col-12 col-md-3 mb-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="px-xl-3">
                                <a href="<?php echo base_url('bai-dang-cua-toi') ?>" class="btn btn-block btn-warning">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Đăng tin bán xe</span>
                                </a>
                                <a href="<?php echo base_url('bai-dang-tin-mua-xe') ?>" class="btn btn-block btn-primary">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Đăng tin mua xe</span>
                                </a>
                                <a href="<?php echo base_url('dang-xuat') ?>" class="btn btn-block btn-secondary">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold">Support</h6>
                            <p class="card-text">Hỗ trợ khách hàng 24/7</p>
                            <button type="button" class="btn btn-primary">Liên hệ chúng tôi</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    // Function to reload the page
    function reloadPage() {
        window.location.reload();
    }

    // Set the interval to reload the page every 5 minutes (300000 milliseconds)
    setInterval(reloadPage, 5000); // You can adjust the time interval as needed
</script>

