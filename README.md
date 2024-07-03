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
