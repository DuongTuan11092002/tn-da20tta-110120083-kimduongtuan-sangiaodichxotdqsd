<div class="container">
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <table class="table table-bordered shadow" id="user-product-table">
                        <thead class="bg-dark text-white">
                            <tr class="text-uppercase">
                                <th scope="col">stt</th>
                                <th scope="col">hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Ngày hết hạn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($Postes as $key => $value) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td>
                                        <img src="<?php echo base_url('uploads/product/' . $value->product_thumbnail) ?>" alt="" width="100px">
                                    </td>
                                    <td><?php echo $value->product_name ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($value->created_at)) ?></td>
                                    <td>
                                        <?php
                                        if ($value->product_status == 0) {
                                            echo "<div class='text text-secondary'>Đợi duyệt</div>";
                                        } else if ($value->product_status == 1) {
                                            echo "<div class='text text-success'>Đã duyệt</div>";
                                        } else if ($value->product_status == 2) {
                                            echo "<div class='text text-warning'>Nổi bật</div>";
                                        } else if ($value->product_status == 3) {
                                            echo "<div class='text text-danger'>Đã hết hạn</div>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('chi-tiet-bai-dang-cua-toi/' . $value->product_id) ?>" class="btn btn-warning">Chi tiết</a>
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