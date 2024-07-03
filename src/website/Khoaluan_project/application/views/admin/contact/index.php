<div class="main-panel">
    <div class="content-wrapper">
        <h1 class="text-center text-uppercase font-weight-bold mb-4">Chi tiết liên hệ</h1>
        <div class="container">
            <form action="<?php echo base_url('cap-nhat-thong-tin-chi-tiet-lien-he/' . $value->id) ?>" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Họ và Tên:</label>
                            <input type="text" value="<?php echo $value->tenTK ?>" id="" class="form-control shadow-lg" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" value="<?php echo $value->email ?>" id="" class="form-control shadow-lg" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Ngày gửi:</label>
                            <input type="text" value="<?php echo date('d-m-Y', strtotime($value->created_at)) ?>" class="form-control shadow-lg  rounded-pill" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Trạng thái:</label>
                        <select class="form-control shadow-lg" name="status">
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
                    <div class="col-lg-4">
                        <label for="">Số điện thoại:</label>
                        <input type="text" value="<?php echo $value->phone ?>" class="form-control shadow-lg" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nội dung:</label>
                    <textarea name="" class="form-control shadow-lg" cols="10" rows="10" readonly><?php echo $value->content ?></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-5"></div>
                    <div class="col-lg-2">
                        <input type="submit" class="btn btn-success w-100" value="Cập nhật">
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>