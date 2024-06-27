<div class="container">
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <form action="">
                        <div class=" row mt-4">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class=" font-italic font-weight-bold">Tên dòng xe: </label>
                                    <input type="text" value="<?php echo $BuyID->name ?>" id="" class=" form-control form-form-control-plaintext shadow-lg" readonly>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class=" font-italic font-weight-bold">Mã tin: </label>
                                    <input type="text" value="<?php echo $BuyID->code_sales ?>" id="" class=" form-control form-form-control-plaintext shadow-lg" readonly>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class=" font-italic font-weight-bold">Hãng xe hơi: </label>
                                    <input type="text" value="<?php echo $BuyID->tenHX ?>" class=" form-control form-control-lg shadow-lg" readonly>

                                </div>



                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class=" font-italic font-weight-bold">Dòng phân khúc xe hơi: </label>
                                    <input type="text" value="<?php echo $BuyID->tenDX ?>" class=" form-control form-control-lg shadow-lg" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class=" font-italic font-weight-bold">Mô tả: </label>
                                    <textarea id="" cols="10" rows="5" class=" form-control form-control-lg shadow-lg" readonly><?php echo $BuyID->description ?></textarea>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 mt-4">
                                    <label for="" class=" font-italic font-weight-bold">Hình ảnh: </label>
                                    <img src="<?php echo base_url('uploads/new/' . $BuyID->thumbnail) ?>" width="300px" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class=" font-italic font-weight-bold">Ngày đăng bài:</label>
                                    <input type="text" class=" form-control form-control-lg shadow-lg" value="<?php echo date('d-m-Y', strtotime($BuyID->created_at)) ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class=" font-italic font-weight-bold">Ngày hết hạn:</label>
                                    <input type="text" class=" form-control form-control-lg shadow-lg" value="<?php echo date('d-m-Y', strtotime($BuyID->end_time)) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class=" font-italic font-weight-bold">Trạng thái</label>
                                    <select class=" form-control form-control-lg shadow-lg rounded-pill " id="">
                                        <?php
                                        if ($BuyID->status == 0) {
                                        ?>
                                            <option value="0" selected>Chưa duyệt</option>
                                            <option value="1">Duyệt</option>
                                            <option value="2">Hết hạn</option>
                                            <option value="3">Nổi bật</option>
                                        <?php
                                        } else if ($BuyID->status == 1) {
                                        ?>
                                            <option value="0">Chưa duyệt</option>
                                            <option value="1" selected>Duyệt</option>
                                            <option value="2">Hết hạn</option>
                                            <option value="3">Nổi bật</option>

                                        <?php
                                        } else if ($BuyID->status == 2) {
                                        ?>
                                            <option value="0">Chưa duyệt</option>
                                            <option value="1">Duyệt</option>
                                            <option value="2" selected>Hết hạn</option>
                                            <option value="3">Nổi bật</option>
                                        <?php
                                        } else if ($BuyID->status == 3) {
                                        ?>
                                            <option value="0">Chưa duyệt</option>
                                            <option value="1">Duyệt</option>
                                            <option value="2">Hết hạn</option>
                                            <option value="3" selected  >Nổi bật</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">

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

    setInterval(reloadPage, 2000);
</script>