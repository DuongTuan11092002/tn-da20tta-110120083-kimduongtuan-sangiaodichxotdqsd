<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'indexController/index';
$route['404_override'] = 'indexController/Error';
$route['translate_uri_dashes'] = FALSE;


/* -------------------------------------------------------------------------- */
/*                                    ĐĂNG NHẬP                                   */
$route['dang-nhap']['GET'] = 'loginController/index';
$route['xu-ly-dang-nhap']['POST'] = 'loginController/handleLogin';
$route['dang-xuat']['GET'] = 'loginController/logout';
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                   ĐĂNG KÝ                                  */
$route['dang-ky']['GET'] = 'loginController/register';
$route['xu-ly-dang-ky']['POST'] = 'loginController/handleRegister';

/* -------------------------------------------------------------------------- */





/* -------------------------------------------------------------------------- */
/*                             PHẦN QUẢN TRỊ VIÊN ADMIN                  */
$route['quan-tri']['GET'] = 'admin/dashboardController/dashboard';

/* -------------------------------------------------------------------------- */
/*                                 QUẢN LÝ HÃNG XE                            */
$route['company-management']['GET'] = 'admin/companyController/list';
// ==> khởi tạo
$route['add-company']['GET'] = 'admin/companyController/create';
$route['company-managament/info-company']['POST'] = 'admin/companyController/handleADD';
// ==> chỉnh sửa
$route['edit-company/(:any)']['GET'] = 'admin/companyController/edit/$1';
$route['company-managament/info-company-edit/(:any)']['POST'] = 'admin/companyController/handleEDIT/$1';
// ==> xóa
$route['delete-company/(:any)']['GET'] = 'admin/companyController/delete/$1';
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                              QUẢN LÝ SẢN PHẨM                              */
$route['product-management']['GET'] = 'admin/productController/select';
$route['edit-product-management/(:any)']['GET'] = 'admin/productController/edit/$1';
$route['handle-edit-product-management/(:any)']['POST'] = 'admin/productController/handleEdit/$1';
$route['delete-product-management/(:any)']['GET'] = 'admin/productController/delete/$1';

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                 QUẢN LÝ BANNER                    */
$route['banner-management']['GET'] = 'admin/bannerController/List';
// ==> khởi tạo
$route['add-banner']['GET'] = 'admin/bannerController/Create';
$route['banner-management/info-banner']['POST'] = 'admin/bannerController/HandleCreate';
// ==> chỉnh sửa
$route['edit-banner/(:any)']['GET'] = 'admin/bannerController/Edit/$1';
$route['banner-management/info-banner-edit/(:any)']['POST'] = 'admin/bannerController/handleEDIT/$1';
// ==> xóa
$route['delete-banner/(:any)']['GET'] = 'admin/bannerController/Delete/$1';
/* ---------------------------------------------------------------------------*/

/* -------------------------------------------------------------------------- */
/*                                 QUẢN LÝ DÒNG XE                    */
$route['vehicles-management']['GET'] = 'admin/vehiclesController/list';
// ==> khởi tạo
$route['add-vehicles']['GET'] = 'admin/vehiclesController/create';
$route['vehicles-management/info-vehicles']['POST'] = 'admin/vehiclesController/handleADD';
// ==> chỉnh sửa
$route['edit-vehicles/(:any)/(:any)']['GET'] = 'admin/vehiclesController/edit/$1/$2';
$route['vehicles-management/info-vehicles-edit/(:any)']['POST'] = 'admin/vehiclesController/handleEDIT/$1';
// ==> xóa
$route['delete-vehicles/(:any)']['GET'] = 'admin/vehiclesController/delete/$1';
/* ---------------------------------------------------------------------------*/


/* -------------------------------------------------------------------------- */
/*                            QUẢN LÝ KHU VỰC TỈNH                            */
$route['city-management']['GET'] = 'admin/cityController/list';
// ==> khởi tạo
$route['add-city']['GET'] = 'admin/cityController/create';
$route['city-management/info-city']['POST'] = 'admin/cityController/handleADD';
// ==> chỉnh sửa
$route['edit-city/(:any)/(:any)']['GET'] = 'admin/cityController/edit/$1/$2';
$route['city-management/info-city-edit/(:any)']['POST'] = 'admin/cityController/handleEDIT/$1';
// ==> xóa
$route['delete-city/(:any)']['GET'] = 'admin/cityController/delete/$1';
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                QUẢN LÝ GÓI DỊCH VỤ                         */
$route['package-management']['GET'] = 'admin/packageController/list';
// ==> khởi tạo
$route['add-package']['GET'] = 'admin/packageController/create';
$route['package-management/info-package']['POST'] = 'admin/packageController/handleADD';
// ==> chỉnh sửa
$route['edit-package/(:any)/(:any)']['GET'] = 'admin/packageController/edit/$1/$2';
$route['package-management/info-package-edit/(:any)']['POST'] = 'admin/packageController/handleEDIT/$1';
// ==> xóa
$route['delete-package/(:any)']['GET'] = 'admin/packageController/delete/$1';

/* ------------------------- WATCH REGISTER PACKAGE ------------------------- */
$route['register_package']['GET'] = 'admin/registerpackageController/list';
$route['detail-register_package/(:any)']['GET'] = 'admin/registerpackageController/Detail/$1';
$route['Handle-detail/(:any)/(:any)']['post'] = 'admin/registerpackageController/Handledetail/$1/$2';

$route['delete-register_package/(:any)']['GET'] = 'admin/registerpackageController/Delete/$1';


/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                   QUẢN LÝ CÁC (DANH MỤC, TIN MUA XE, TIN TỨC )     */

/* -------------------------------------------------------------------------- */
/*                             quản lý danh mục                               */
$route['category-management']['GET'] = 'admin/newController/category';
// ==> khởi tạo
$route['add-category-management']['GET'] = 'admin/newController/categoryADD';
$route['category-management/info-category']['POST'] = 'admin/newController/handleCategoryADD';
// ==> chỉnh sửa
$route['edit-category-management/(:any)/(:any)']['GET'] = 'admin/newController/categoryEDIT/$1/$2';
$route['category-management/info-category-edit/(:any)']['POST'] = 'admin/newController/handleEDIT/$1';
// ==> xóa
$route['delete-category-management/(:any)/(:any)']['GET'] = 'admin/newController/categoryDELETE/$1/$2';

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                 tin mua xe                                 */
$route['new-sales-management']['get'] = 'admin/newController/newBuyCarList';
// 
$route['update-new-sales-management/(:any)']['get'] = 'admin/newController/newBuyCarEdit/$1';
$route['info-edit-new-sale-management/(:any)']['post'] = 'admin/newController/HandleNewBuyCarEdit/$1';
// 
$route['delete-new-sales-management/(:any)']['get'] = 'admin/newController/DeleteNewSaleCar/$1';


/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                               quản lý tin tức                              */
$route['new-management']['GET'] = 'admin/newController/new';
// ==> khởi tạo
$route['add-new-management']['GET'] = 'admin/newController/newADD';
$route['new-management/info-new']['POST'] = 'admin/newController/handlenewADD';
// ==> chỉnh sửa
$route['edit-new-management/(:any)/(:any)']['GET'] = 'admin/newController/newEDIT/$1/$2';
$route['new-management/info-new-edit/(:any)']['POST'] = 'admin/newController/handlenewEDIT/$1';
// ==> xóa
$route['delete-new-management/(:any)/(:any)']['GET'] = 'admin/newController/deleteNEW/$1/$2';
/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
/*                          quản lý chi tiết liên hệ                          */
$route['chi-tiet-lien-he-admin/(:any)']['GET'] = 'admin/dashboardController/detailContact/$1';
$route['cap-nhat-thong-tin-chi-tiet-lien-he/(:any)']['POST'] = 'admin/dashboardController/handleDetailContact/$1';
/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */








/* -------------------------------------------------------------------------- */
/*                            QUẢN TRỊ DOANH NGHIỆP                           */
$route['quan-tri-doanh-nghiep']['GET'] = 'business/dashboardController/dashboard';

/* -------------------------------------------------------------------------- */
/*                              QUẢN LÝ SẢN PHẨM                              */
$route['quan-ly-san-pham-doanh-nghiep']['GET'] = 'business/productController/list';
//==> khởi tạo
$route['them-san-pham-doanh-nghiep']['GET'] = 'business/productController/create';
$route['san-pham-doanh-nghiep/thong-tin-san-pham']['POST'] = 'business/productController/handleADD';
//==> chỉnh sửa
$route['sua-san-pham-doanh-nghiep/(:any)']['GET'] = 'business/productController/edit/$1';
$route['san-pham-doanh-nghiep/thong-tin-san-pham-chinh-sua/(:any)'] = 'business/productController/handleEDIT/$1';
//==> xóa
$route['xoa-san-pham-doanh-nghiep/(:any)']['GET'] = 'business/productController/delete/$1';


/* ------------------------------QUẢN LÝ THƯ VIỆN HÌNH ẢNH ----------------------------- */
//==>xóa ảnh trong thư viện
$route['xoa-anh-thu-vien/(:any)/(:any)']['GET'] = 'business/productController/deleteLibraryIMG/$1/$2';

/* -------------------------------------------------------------------------- */

/* ----------------- danh sách đăng ký gói cho doanh nghiep ----------------- */
$route['danh-sach-dang-ky-goi-doanh-nghiep']['GET'] = 'business/packageController/list';
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                 PHÂN TRANG                                 */
//Danh sách tất cả xe hơi cũ
$route['phan-trang-danh-sach-tat-ca-xe-cu/(:num)'] = 'indexController/productAll/$1';
$route['phan-trang-danh-sach-tat-ca-xe-cu'] = 'indexController/productAll/';
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                        Xem chi tiết liên hệ sản phẩm                       */
$route['chi-tiet-lien-he-san-pham/(:any)']['GET'] = 'business/dashboardController/DetailContact/$1';
$route['cap-nhat-thong-tin-lien-he-san-pham/(:any)']['POST'] = 'business/dashboardController/HandleUpdateContact/$1';
/* -------------------------------------------------------------------------- */










/* -------------------------------------------------------------------------- */
/*                             QUẢN LÝ NGUỜI DÙNG                             */

//quản lý hồ sơ người dùng
$route['ho-so-cua-toi/(:any)']['GET'] = 'indexController/profile/$1';
$route['thong-tin-ho-so-chinh-sua/(:any)']['POST'] = 'indexController/handleProfile/$1';
// Quản lý bài đăng bán xe
$route['bai-dang-cua-toi']['GET'] = 'indexController/MyPost';
$route['chi-tiet-bai-dang-cua-toi/(:any)']['GET'] = 'indexController/DetailMyPost/$1';
// Quản lý bài đăng tin mua xe
$route['bai-dang-tin-mua-xe']['GET'] = 'indexController/MyBuyCar';
$route['chi-tiet-bai-dang-tin-mua-xe/(:any)']['GET'] = 'indexController/DetailBuyByID/$1';
// Quản lý danh sách thông tin liên hệ sản phẩm của người dùng
$route['danh-sach-lien-he']['GET'] = 'indexController/contactList/$1';
$route['chi-tiet-lien-he-user/(:any)']['GET'] = 'indexController/detailContactList/$1';
$route['cap-nhat-chi-tiet-lien-he-user/(:any)']['POST'] = 'indexController/handleDetailContactList/$1';
/* -------------------------------------------------------------------------- */
/*                                 Phân trang                                 */
$route['phan-trang-san-pham/(:num)'] = 'indexController/index/$1';
$route['phan-trang-san-pham'] = 'indexController/index';
/* -------------------------------------------------------------------------- */

// ===>
/* -------------------------------------------------------------------------- */
/*                              Quãn lý sản phẩm                              */
//danh sách theo hãng xe
$route['danh-muc-hang-xe/(:any)/(:any)']['GET'] = 'indexController/categoryCompany/$1/$2';
$route['danh-muc-hang-xe/(:any)/(:any)/(:any)']['GET'] = 'indexController/categoryCompany/$1/$2';


//danh sách theo dòng xe
$route['danh-muc-dong-xe/(:any)/(:any)']['GET'] = 'indexController/categoryVehicles/$1/$2';
$route['danh-muc-dong-xe/(:any)/(:any)/(:any)']['GET'] = 'indexController/categoryVehicles/$1/$2';


//danh sách theo thành phố
$route['danh-muc-thanh-pho/(:any)/(:any)']['GET'] = 'indexController/categoryCity/$1/$2';
$route['danh-muc-thanh-pho/(:any)/(:any)/(:any)']['GET'] = 'indexController/categoryCity/$1/$2/';

//danh sách các sản phẩm doanh nghiệp
$route['danh-muc-san-pham-doanh-nghiep/(:any)']['GET'] = 'indexController/category_product_business/$1';
$route['danh-muc-san-pham-doanh-nghiep/(:any)/(:any)']['GET'] = 'indexController/category_product_business/$1/$2';
//chi tiết sản phẩm
$route['chi-tiet-san-pham/(:any)/(:any)']['GET'] = 'indexController/detailProduct/$1/$2';
// Bình luận sản phẩm
$route['comment/send']['POST'] = 'indexController/SendComment';
// Thông tin liên hệ chi tiết sản phẩm
$route['thong-tin-lien-he-san-pham']['POST'] = 'indexController/SendContactToProduct';
/* -------------------------------------------------------------------------- */
// ===>
/* -------------------------------------------------------------------------- */
/*                           DANH SÁCH TẤT CẢ XE CŨ                           */
$route['danh-sach-tat-ca-xe-cu']['GET'] = 'indexController/productAll';
/* -------------------------------------------------------------------------- */

// 
/* -------------------------------------------------------------------------- */
/*                               Đăng tin bán xe                              */
$route['dang-tin-ban-xe']['GET'] = 'indexController/formSellCar';
$route['thong-tin-dang-tin-ban-xe']['POST'] = 'indexController/PostSellCar';
/* -------------------------------------------------------------------------- */


// ==>
/* -------------------------------------------------------------------------- */
/*                                 Gói dịch vụ                                */
$route['goi-dich-vu']['GET'] = 'indexController/pricingCart';
$route['xac-nhan-thanh-toan-goi/(:any)/(:any)']['GET'] = 'indexController/CheckoutPackage/$1/$2';
$route['xac-nhan-thanh-toan']['POST'] = 'indexController/handlePackage';
/* -------------------------------------------------------------------------- */



// ==>Quản lý tin tức
/* -------------------------------------------------------------------------- */
/*                                 Tin mua xe                                 */
$route['tin-mua-xe']['GET'] = 'indexController/NewBuyCar';
// phân trang tin tức
$route['phan-trang-tin-mua-xe/(:num)'] = 'indexController/NewBuyCar/$1';
$route['phan-trang-tin-mua-xe'] = 'indexController/NewBuyCar/';


// ==>Đăng tin mua xe hơi
$route['dang-tin-mua-xe']['GET'] = 'indexController/PostBuyCar';
// xử lý bài đăng
$route['thong-tin-dang-tin-mua-xe']['post'] = 'indexController/HandlePostBuyCar';

// tìm kiếm tin tức mua xe
$route['tim-kiem-thong-tin-mua-xe']['GET'] = 'indexController/SearchNewSale';

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                   Tin Tức                                  */
$route['tin-tuc']['GET'] = 'indexController/NewList';
$route['phan-trang-tin-tuc/(:num)'] = 'indexController/NewList/$1';
$route['phan-trang-tin-tuc'] = 'indexController/NewList/';

$route['chi-tiet-tin-tuc/(:any)/(:any)']['get'] = 'indexController/detailNew/$1/$2';

/* -------------------------------------------------------------------------- */





// ==>
/* -------------------------------------------------------------------------- */
/*                                   Liên hệ                                  */
$route['lien-he']['GET'] = 'indexController/Contact';
$route['thong-tin-lien-he']['POST'] = 'indexController/HandleContact';
/* -------------------------------------------------------------------------- */








// ==> Tìm kiếm sản phẩm
$route['tim-kiem-thong-tin']['GET'] = 'indexController/Search';
$route['tim-kiem-thong-tin/(:num)']['GET'] = 'indexController/Search/$1';
// ==> Tìm kiếm sản phẩm theo chọn sản phẩm 
$route['tim-kiem-san-pham-danh-muc']['POST'] = 'indexController/SearchCategory';
/* -------------------------------------------------------------------------- */