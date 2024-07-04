<<<<<<< HEAD
# Sàn Giao Dịch Xe Ô Tô Đã Qua Sử Dụng

Dự án này là một sàn giao dịch xe ô tô đã qua sử dụng, được phát triển bằng CodeIgniter 3.

## Yêu cầu hệ thống

- PHP >= 5.6
- MySQL
- Apache/Nginx
- Composer

## Cài đặt

### 1. Clone repository

```bash
git clone https://github.com/DuongTuan11092002/tn-da20tta-110120083-kimduongtuan-sangiaodichxotdqsd.git
cd tn-da20tta-110120083-kimduongtuan-sangiaodichxotdqsd
2. Cấu hình cơ sở dữ liệu
Mở file application/config/database.php và chỉnh sửa thông tin kết nối cơ sở dữ liệu của bạn:

php
Sao chép mã
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'your_username',
    'password' => 'your_password',
    'database' => 'your_database',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
3. Tạo cơ sở dữ liệu
Nhập các tệp SQL có trong thư mục database để tạo cấu trúc và dữ liệu ban đầu cho dự án.
=======
## Cài đặt và Khởi chạy Chương trình Hệ thống Sàn Giao dịch Xe Ô tô Đã Qua Sử dụng

### Giới thiệu

Đây là file hướng dẫn cài đặt và khởi chạy chương trình hệ thống sàn giao dịch xe ô tô đã qua sử dụng được phát triển dựa trên framework CodeIgniter 3. Dự án được lưu trữ tại kho lưu trữ GitHub: [https://github.com/bcit-ci/CodeIgniter](https://github.com/bcit-ci/CodeIgniter)

### Yêu cầu hệ thống

* Máy chủ web hỗ trợ PHP 7.4 trở lên
* Cơ sở dữ liệu MySQL 5.7 trở lên
* Composer
* cài đặt xampp và khởi chạy APACHE, mySQL

### Cài đặt

1. Clone dự án từ kho lưu trữ GitHub:

```bash
git clone https://github.com/DuongTuan11092002/tn-da20tta-110120083-kimduongtuan-sangiaodichxotdqsd.git
```

2. Di chuyển vào thư mục dự án:

```bash
cd tn-da20tta-110120083-kimduongtuan-sangiaodichxotdqsd
```

3. Cài đặt đường dẫn:

 - Vào thư mục application/config/config.php
 - cấu hình lại config['base_url'] = đường dẫn hệ thống
```bash
  $config['base_url'] = 'http://localhost:7000/';
```

4. Cấu hình cơ sở dữ liệu:
- Vào thư mục application/config/database.php
```bash
  <?php
defined('BASEPATH') or exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root', //thông tin về máy chủ sql
	'password' => '', //mật khẩu mysql
	'database' => 'db_ecommer_basic', // tên csdl
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```


5. Khởi chạy migrations:

```bash
php artisan migrate
```

6. Khởi chạy seed data:

```bash
php artisan db:seed
```

7. Khởi động server web:

```bash
php artisan serve
```

### Truy cập ứng dụng

Mở trình duyệt web và truy cập địa chỉ `http://localhost:8000`.

### Tài liệu hướng dẫn

Để biết thêm thông tin chi tiết về cách sử dụng ứng dụng, vui lòng tham khảo tài liệu hướng dẫn tại:

* [Link tài liệu hướng dẫn] (Sẽ bổ sung sau)

### Góp ý

Mọi góp ý và đóng góp cho dự án đều được hoan nghênh. Bạn có thể gửi issue trên kho lưu trữ GitHub hoặc liên hệ trực tiếp với tác giả.
>>>>>>> 0984f6a006b7875a3c870c82f9a8b0456cc28c6f
