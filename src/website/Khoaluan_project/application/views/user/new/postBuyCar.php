<div class="section">
    <div class="post-entry">
        <div class="row">

            <?php
            $this->data['NewListHot'] = $this->indexModel->getNewLimit();
            $this->data['NewSaleCarHot'] = $this->indexModel->selectNewSaleCarHot();
            $this->data['citys'] = $this->cityModel->select();
            $this->load->view('user/template_user/sidebarNew', $this->data);
            ?>

            <div class="col-lg-9">
                <h3 class=" text-uppercase text-center mt-5">Đăng tin mua xe hơi</h3>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <?php
                            if ($this->session->userdata('success')) {
                            ?>
                                <span class=" alert alert-success"><?php echo $this->session->userdata('success') ?></span>
                            <?php
                            } else  if ($this->session->userdata('error')) {
                            ?>
                                <span class=" alert alert-danger"><?php echo $this->session->userdata('error') ?></span>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>

                    <form action="<?php echo base_url('thong-tin-dang-tin-mua-xe') ?>" method="post" enctype="multipart/form-data">
                        <div class=" row mt-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="">Tên dòng xe: </label>
                                    <input type="text" name="name" id="" class=" form-control form-form-control-plaintext shadow">
                                    <?php echo "<span class=' text-danger font-italic'>" . form_error('name') . "<span>" ?>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="">Hãng xe hơi: </label>
                                    <select name="categories_company_id" id="" class=" form-control shadow w-50 rounded-pill" required>
                                        <option value="">CHỌN HÃNG XE HƠI</option>
                                        <?php
                                        foreach ($companies as $key => $value) {
                                        ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>



                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="">Dòng phân khúc xe hơi: </label>
                                    <select name="categories_vehicles_id" id="" class=" form-control shadow w-50 rounded-pill" required>
                                        <option value="">CHỌN DÒNG PHÂN KHÚC</option>
                                        <?php
                                        foreach ($vehicles as $key => $value) {
                                        ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="">Mô tả: </label>
                                    <textarea name="content" id="" cols="10" rows="5" class=" form-control form-control-lg shadow-lg"></textarea>
                                    <?php echo "<span class=' text-danger font-italic'>" . form_error('content') . "<span>" ?>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="">Hình ảnh: </label>
                                    <input type="file" name="thumbnail" id="" class=" form-control form-control-file">
                                    <span style="color: #888; font-style:italic;">Lưu ý: 1 ảnh xe cần mua</span>
                                    <?php if (isset($error)) {
                                        echo $error;
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-6"></div>
                            <div class="col-lg-2">
                                <input type="submit" value="Đăng bài" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>