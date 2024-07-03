<div class="main-panel">
    <div class="content-wrapper">
        <h3 class=" text-uppercase  font-weight-bold text-center">Quản lý tin mua xe hơi</h3>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <?php
                if ($this->session->userdata('success')) {
                ?>
                    <span class=" text-danger font-weight-bold font-italic alert alert-success"> <?php echo $this->session->userdata('success') ?></span>
                <?php
                }
                ?>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <table class="table" id="new-sale-table">
            <thead>
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên bài đăng</th>
                    <th scope="col">Ngày đăng bài</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($newSaleList as $key => $value) {
                    $i++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td>
                            <img src="<?php echo base_url('uploads/new/' . $value->thumbnail) ?>" alt="" width="100%">
                        </td>
                        <td><?php echo $value->name ?></td>
                        <td><?php echo $value->created_at ?></td>
                        <td>
                            <?php
                            if ($value->status == 0) {
                                echo '<span class=" text-danger font-italic font-weight-bold">Chưa duyệt</span>';
                            } else  if ($value->status == 1) {
                                echo '<span class=" text-success font-italic font-weight-bold">Đã duyệt</span>';
                            } else  if ($value->status == 3) {
                                echo '<span class=" text-success font-italic font-weight-bold">Nổi bật</span>';
                            }else  if ($value->status == 2) {
                                echo '<span class=" text-success font-italic font-weight-bold">Hết hạn</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('update-new-sales-management/' . $value->id) ?>" class="btn btn-warning text-black mr-5">Cập nhật</a>
                            <a href="<?php echo base_url('delete-new-sales-management/' . $value->id) ?>" class="btn btn-danger text-white">Xóa</a>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>