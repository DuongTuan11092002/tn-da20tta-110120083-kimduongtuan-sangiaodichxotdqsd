<div class="main-panel">
    <div class="content-wrapper">
        <h3 class=" text-uppercase  font-weight-bold text-center">Cập nhật tin mua xe hơi</h3>
        <div class="container">
            <form action="<?php echo base_url('info-edit-new-sale-management/' . $newSaleEditID->id) ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class=" font-italic font-weight-bold text-black">Tên bài viết</label>
                            <input type="text" name="" id="" class=" form-control form-control-lg" value="<?php echo $newSaleEditID->name ?>" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class=" font-italic font-weight-bold text-black">Mã bản tin:</label>
                            <input type="text" name="" id="" class=" form-control form-control-lg w-25 rounded-pill" readonly value="<?php echo $newSaleEditID->code_sales ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 d-flex">
                        <div class="mb-3 mr-5">
                            <label for="" class=" font-italic font-weight-bold text-black">Thuộc hãng xe:</label>
                            <input type="text" name="" id="" class=" form-control form-control-lg rounded-pill w-100 " value="<?php echo $newSaleEditID->tenHX ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="" class=" font-italic font-weight-bold text-black">Thuộc phân khúc:</label>
                            <input type="text" name="" id="" class=" form-control form-control-lg rounded-pill w-100" value="<?php echo $newSaleEditID->tenPK ?>" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class=" font-italic font-weight-bold text-black">Tên người đăng:</label>
                            <input type="text" name="" id="" class=" form-control form-control-lg w-50 rounded-pill" readonly value="<?php echo $newSaleEditID->tenTK ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">

                            <label for="" class=" text-black font-italic font-weight-bold d-block">Hình ảnh:</label>
                            <img src="<?php echo base_url('uploads/new/' . $newSaleEditID->thumbnail) ?>" alt="" width="300px">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class=" text-black font-italic font-weight-bold d-block">Trạng thái:</label>
                            <select name="status" id="" class=" form-control form-control-lg w-50 rounded-pill">
                                <?php
                                if ($newSaleEditID->status == 0) {
                                ?>
                                    <option value="0" selected>Chưa duyệt</option>
                                    <option value="1">Duyệt</option>
                                    <option value="2" >Hết hạn</option>
                                    <option value="3">Nổi bật</option>

                                <?php
                                } else if ($newSaleEditID->status == 1) {
                                ?>
                                    <option value="0">Chưa duyệt</option>
                                    <option value="1" selected>Duyệt</option>
                                    <option value="2" >Hết hạn</option>
                                    <option value="3">Nổi bật</option>
                                <?php
                                } else if ($newSaleEditID->status == 3) {
                                ?>
                                    <option value="0">Chưa duyệt</option>
                                    <option value="1">Duyệt</option>
                                    <option value="2" >Hết hạn</option>
                                    <option value="3" selected>Nổi bật</option>
                                <?php
                                } else if ($newSaleEditID->status == 2) {
                                ?>
                                    <option value="0">Chưa duyệt</option>
                                    <option value="1">Duyệt</option>
                                    <option value="3">Nổi bật</option>
                                    <option value="2" selected>Hết hạn</option>
                                <?php
                                }
                                ?>

                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class=" text-black font-italic font-weight-bold d-block">Nội dung:</label>

                            <textarea name="" id="" cols="10" rows="5" class=" form-control form-control-lg" readonly><?php echo $newSaleEditID->description ?></textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="">Ngày hết hạn:</label>
                        <?php $date = date('Y-m-d', strtotime($newSaleEditID->end_time)); ?>
                        <input type="date" value="<?php echo $date ?>" id="" name="end_time" class="form-control form-control-lg">
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <input type="submit" value="Cập nhật" class=" btn btn-success">
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>