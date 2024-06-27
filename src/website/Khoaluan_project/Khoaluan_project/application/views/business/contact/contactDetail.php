<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <h3 class=" font-weight-bold text-center text-uppercase" style="letter-spacing: 5px;">Thông tin liên hệ</h3>
            <form action="<?php echo base_url('cap-nhat-thong-tin-lien-he-san-pham/' . $value->id) ?>" method="post">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="">Họ và Tên:</label>
                            <input type="text" name="" id="" class=" form-control form-control-lg shadow  rounded-pill" value="<?php echo $value->fullname ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="">Số điện thoại:</label>
                            <input type="text" name="" id="" class=" form-control form-control-lg shadow  rounded-pill" value="<?php echo $value->phone ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="">Email:</label>
                            <input type="text" name="" id="" class=" form-control form-control-lg shadow rounded-pill" value="<?php echo $value->email ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="">Trạng thái:</label>
                            <select name="status" id="" class=" form-control form-control-lg rounded-pill shadow-lg">
                                <?php
                                if ($value->status == 0) {
                                ?>
                                    <option value="0" selected>Chưa duyệt</option>
                                    <option value="1">Đã duyệt</option>
                                <?php
                                } else if ($value->status == 1) {
                                ?>
                                    <option value="0">Chưa duyệt</option>
                                    <option value="1" selected>Đã duyệt</option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="">Nội dung:</label>
                    <textarea name="" id="" cols="30" rows="5" class=" form-control " readonly><?php echo $value->content ?></textarea>
                </div>

                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <input type="submit" value="Cập nhật" class="btn btn-success w-75 mt-3">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>