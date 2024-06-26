<div class="container">
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">

                    <h3 class=" text-center text-uppercase font-weight-bold mb-5 mt-3">Chi tiết thông tin liên hệ</h3>
                    <form action="<?php echo base_url('cap-nhat-chi-tiet-lien-he-user/' . $value->id) ?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Họ và Tên:</label>
                                    <input type="text" value="<?php echo $value->fullname ?>" class=" form-control form-control-lg shadow-lg" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Email:</label>
                                    <input type="text" value="<?php echo $value->email ?>" class=" form-control form-control-lg shadow-lg" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Số điện thoại:</label>
                                    <input type="text" value="<?php echo $value->phone ?>" class=" form-control form-control-lg shadow-lg" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Trạng thái:</label>
                                    <select name="status" id="" class=" form-control form-control-lg shadow-lg">
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
                            <textarea name="" id="" cols="30" rows="5" class="form-control form-control-lg shadow-lg" readonly><?php echo $value->content ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-5"></div>
                            <div class="col-lg-5"></div>
                            <div class="col-lg-2">
                                <input type="submit" value="Cập nhật" class="btn btn-success">
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
                                <a href="<?php echo base_url('danh-sach-lien-he') ?>" class="btn btn-block btn-secondary">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Danh sách liên hệ</span>
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