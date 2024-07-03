<div class="container">
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">

                    <h3 class=" text-center text-uppercase font-weight-bold mb-5 mt-3">Danh sách liên hệ sản phẩm</h3>
                    <div class="row">
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-8">
                            <?php
                            if ($this->session->flashdata('success')) {
                            ?>
                                <span class=" alert alert-success"><?php echo $this->session->flashdata('success') ?></span>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>
                    <table class="table table-bordered shadow-lg" id="profile-contact-table">
                        <thead style="background-color: green; color: white;">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ và Tên</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Ngày gửi</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($contacts as $key => $value) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?php echo $value->fullname ?></td>
                                    <td><?php echo $value->tenSP ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($value->created_at)) ?></td>
                                    <td>
                                        <?php
                                        if ($value->status == 0) {
                                            echo "<span class='text text-danger'>Chưa duyệt</span>";
                                        } else if ($value->status == 1) {
                                            echo "<span class='text text-success'>Đã  duyệt</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('chi-tiet-lien-he-user/' . $value->id) ?>" class="btn btn-warning">Chi tiết</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

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