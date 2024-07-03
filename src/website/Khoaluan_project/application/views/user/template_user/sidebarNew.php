 <!-- Shop Sidebar Start -->
 <div class="col-lg-3 col-md-12 order-2">
     <!-- Price Start -->
     <div class="border-bottom mb-4 pb-4">
         <h5 class="font-weight-semi-bold mb-4 text-uppercase">Bản tin mua xe </h5>
         <div class="" style="max-height: 350px; overflow-y: auto;">
             <?php
                foreach ($NewSaleCarHot as $key => $value) {
                ?>

                 <a href="" class=" text-decoration-none">
                     <div class="row m-3 mb-5">
                         <div class="col-lg-4">
                             <img src="<?php echo base_url('uploads/new/' . $value->thumbnail) ?>" alt="" width="100%" class="img-thumbnail">
                         </div>
                         <div class="col-lg-8">
                             <div class=" font-italic" style="color: #888;"><?php echo date('d-m-Y', strtotime($value->created_at))  ?></div>
                             <h6 class=" text text-black"><?php echo substr($value->name, 0, 70) ?></h6>
                             <div class="">
                                 <span class=" text-black" style="font-size: 13px;"><?php echo $value->tenTK ?> - <?php echo $value->phoneTK ?></span>
                             </div>
                         </div>
                     </div>
                 </a>
             <?php
                }
                ?>
         </div>
     </div>
     <!-- Price End -->

     <!-- tin tức nổi bật Start -->
     <div class="border-bottom mb-4 pb-4">
         <h5 class="font-weight-semi-bold mb-4 text-uppercase">Bản tin tức mới </h5>
         <div class="" style="max-height:350px; overflow:auto;">

             <?php
                foreach ($NewListHot as $key => $value) {
                ?>

                 <a href="<?php echo base_url('chi-tiet-tin-tuc/' . $value->id . '/' . $value->slug) ?>" class=" text-decoration-none">
                     <div class="row m-3 mb-4">

                         <div class="col-lg-4">
                             <img src="<?php echo base_url('uploads/new/' . $value->thumbnail) ?>" alt="" width="100%" class="img-thumbnail">
                         </div>
                         <div class="col-lg-8">
                             <div class=" font-italic" style="color: #888;"><?php echo date('d-m-Y', strtotime($value->created_at))  ?></div>
                             <h6 class=" text text-black"><?php echo substr($value->name, 0, 70) . '...' ?></h6>
                         </div>

                     </div>
                 </a>
             <?php
                }
                ?>
         </div>
     </div>
     <!-- tin tức nổi bật End -->


     <div class="border-bottom mb-4 pb-4">
         <h5 class="font-weight-semi-bold mb-4 text-uppercase">Danh mục thành phố</h5>
         <ul class=" list-unstyled ml-2" style="max-height:100px; overflow-y:auto;">
             <?php
                foreach ($citys as $key => $city) {
                ?>
                 <li class="mb-3"><a href="<?php echo base_url('danh-muc-thanh-pho/' . $city->id . '/' . $city->slug) ?>" class=""><?php echo $city->name ?></a></li>
             <?php
                }
                ?>
         </ul>
     </div>


 </div>
 <!-- Shop Sidebar End -->