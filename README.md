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

3. Cài đặt Composer dependencies:

```bash
composer install
```

4. Cấu hình cơ sở dữ liệu:

* Tạo file `.env` trong thư mục gốc dự án.
* Cập nhật thông tin kết nối cơ sở dữ liệu trong file `.env`.

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
