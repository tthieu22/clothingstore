# Clothing Store - Premium E-commerce Solution (PHP MVC)

[![PHP](https://img.shields.io/badge/Language-PHP%207.4+-777bb4?style=for-the-badge&logo=php)](https://www.php.net/)
[![Database](https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql)](https://www.mysql.com/)
[![Payment](https://img.shields.io/badge/Payment-MoMo%20Integrated-pink?style=for-the-badge)](https://developers.momo.vn/)
[![Architecture](https://img.shields.io/badge/Architecture-Custom%20MVC-orange?style=for-the-badge)](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)

Một giải pháp thương mại điện tử toàn diện được xây dựng trên nền tảng PHP thuần theo kiến trúc MVC, tối ưu hóa cho hiệu năng và khả năng mở rộng. Dự án tích hợp các công nghệ thanh toán hiện đại và hệ thống quản trị mạnh mẽ.

---

## 🚀 Điểm Nhấn Kỹ Thuật (Technical Highlights)

Dự án không chỉ là một trang web bán hàng đơn thuần mà còn là một hệ thống được thiết kế bài bản:

1.  **Kiến Trúc MVC Tùy Chỉnh**: Tách biệt hoàn toàn Logic nghiệp vụ (Controller), Dữ liệu (Model) và Giao diện (View), giúp mã nguồn dễ đọc, bảo trì và mở rộng.
2.  **Hệ Thống Thanh Toán MoMo**: Tích hợp trực tiếp API MoMo với cả hai phương thức: **QR Code** và **ATM Card**, đảm bảo trải nghiệm mua sắm liền mạch.
3.  **Bảo Mật & Phân Quyền**: 
    - Hệ thống phân quyền đa cấp (Admin, Staff, Customer).
    - Xử lý session an toàn và cơ chế reset mật khẩu qua token bảo mật.
4.  **Trải Nghiệm Người Dùng (UX)**:
    - **AJAX Quickview**: Xem nhanh sản phẩm mà không cần tải lại trang.
    - **Smart Cart Logic**: Xử lý giỏ hàng phía server kết hợp cập nhật giao diện mượt mà.
    - **Coupon Engine**: Hệ thống mã giảm giá linh hoạt với logic kiểm tra điều kiện áp dụng.

---

## 🛠 Công Nghệ Sử Dụng (Tech Stack)

-   **Backend**: PHP (Pure MVC), MySQL.
-   **Frontend**: HTML5, CSS3, JavaScript (jQuery), Bootstrap 4/5.
-   **Payment API**: MoMo Payment Gateway.
-   **Deployment**: Hỗ trợ tốt trên Laragon, XAMPP và cấu hình sẵn cho Vercel.

---

## 📦 Tính Năng Chi Tiết

### 🔍 1. Mua Sắm & Tìm Kiếm
- Bộ lọc sản phẩm thông minh theo danh mục và giá cả.
- Tìm kiếm sản phẩm thời gian thực.
- Trang chi tiết sản phẩm với đầy đủ thông tin, hình ảnh và sản phẩm liên quan.

### 💳 2. Thanh Toán & Đơn Hàng
- Giỏ hàng đầy đủ tính năng: Thêm, sửa, xóa, áp dụng mã khuyến mãi.
- Quy trình Checkout 1 bước tối ưu hóa tỷ lệ chuyển đổi.
- Tích hợp thanh toán online qua ví điện tử MoMo.
- Email thông báo trạng thái đơn hàng (tùy chọn cấu hình).

### 🛡️ 3. Quản Trị Hệ Thống (Admin Dashboard)
- **Thống Kê**: Biểu đồ doanh thu, số lượng đơn hàng, sản phẩm bán chạy.
- **Quản Lý Sản Phẩm**: CRUD sản phẩm, quản lý kho hàng và hình ảnh.
- **Quản Lý Đơn Hàng**: Theo dõi và cập nhật trạng thái đơn hàng tập trung.
- **Quản Lý Khuyến Mãi**: Tạo mã giảm giá theo số tiền hoặc phần trăm.

---

## 📂 Cấu Trúc Thư Mục

```text
clothingstore/
├── Admin/              # Hệ thống quản trị (MVC Admin)
│   ├── MVC/            # Logic quản trị tách biệt
│   └── public/         # Tài nguyên Admin
├── Controllers/        # Xử lý logic phía khách hàng
├── Models/             # Lớp giao tiếp Database
├── Views/              # Templates giao diện khách hàng
├── public/             # CSS, JS, Images toàn dự án
├── config_momo.json    # Cấu hình bảo mật MoMo API
├── index.php           # Entry Point (Router chính)
└── shopphone.sql       # Schema cơ sở dữ liệu
```

---

## ⚙️ Hướng Dẫn Cài Đặt

1.  **Chuẩn bị**: Cài đặt **Laragon** hoặc **XAMPP** (PHP >= 7.4).
2.  **Database**: Import file `shopphone.sql` vào MySQL.
3.  **Cấu hình**: Chỉnh sửa thông tin kết nối trong `Models/connection.php`.
4.  **Thanh toán**: Cấu hình `config_momo.json` với Partner Code và Access Key của bạn.
5.  **Truy cập**: Chạy qua localhost (vd: `http://localhost/clothingstore`).

---

## 👨‍💻 Thông Tin Tác Giả

- **GitHub**: [github.com/tthieu22](https://github.com/tthieu22)
- **Role**: Full-stack Developer

---
*Dự án này là minh chứng cho khả năng xây dựng hệ thống E-commerce ổn định và bảo mật trên nền tảng PHP.*

