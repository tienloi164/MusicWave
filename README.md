# 🎵 MusicWave — Website nghe nhạc trực tuyến

MusicWave là website nghe nhạc trực tuyến được xây dựng bằng Laravel, MySQL và Docker, phục vụ mục đích học tập và thực hành phát triển web.

## ✨ Chức năng chính

- Hiển thị danh sách bài hát.
- Phát nhạc trực tiếp trên trình duyệt.
- Tìm kiếm bài hát.
- Thêm bài hát mới.
- Chỉnh sửa thông tin bài hát.
- Xóa bài hát.
- Tải lên ảnh bìa và tệp âm thanh.
- Lưu thông tin bài hát trong MySQL.

## 🛠 Công nghệ sử dụng

- Laravel, PHP
- MySQL 8
- HTML, CSS, JavaScript, Blade
- Docker, Docker Compose
- Nginx

## 📁 Cấu trúc dự án

```text
doanweb/
├── app/                 # Mã nguồn Laravel
├── docker/              # Cấu hình Docker
├── Dockerfile
├── docker-compose.yml
└── README.md
```

## 🚀 Hướng dẫn chạy dự án

### Yêu cầu

- Docker Desktop
- Git

### 1. Tải mã nguồn

```bash
git clone https://github.com/tienloi164/MusicWave.git
cd MusicWave
```

### 2. Tạo file môi trường

Trong PowerShell, chạy tại thư mục gốc:

```powershell
Copy-Item app/.env.example app/.env
```

Nếu file `app/.env` đã tồn tại, không cần tạo lại.

### 3. Cấu hình database

Mở `app/.env` và kiểm tra cấu hình phù hợp với `docker-compose.yml`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=music_db
DB_USERNAME=music_user
DB_PASSWORD=music_password
```

Chỉ sử dụng các giá trị trên nếu chúng khớp với cấu hình Docker của dự án.

### 4. Khởi động Docker

```bash
docker compose up -d --build
```

### 5. Tạo khóa ứng dụng Laravel

```bash
docker compose exec app php artisan key:generate
```

### 6. Tạo bảng database

```bash
docker compose exec app php artisan migrate
```

### 7. Tạo liên kết lưu trữ

```bash
docker compose exec app php artisan storage:link
```

Nếu liên kết đã tồn tại, không cần tạo lại.

### 8. Mở website

Truy cập:

http://localhost:8000

## 🗄 Database và tệp tải lên

Thông tin bài hát được lưu trong MySQL. Ảnh bìa và tệp âm thanh được lưu trong vùng lưu trữ của Laravel.

Khi chuyển máy, cần sao lưu database và các tệp đã tải lên nếu muốn giữ lại dữ liệu.

## 🔐 Lưu ý bảo mật

- Không đưa file `app/.env` lên GitHub.
- Không công khai mật khẩu, API key hoặc thông tin bí mật.
- Không tải bản sao lưu database có dữ liệu riêng tư lên repository công khai.

## 👨‍💻 Tác giả

**tienloi164**

GitHub: https://github.com/tienloi164/MusicWave

---

Dự án được xây dựng phục vụ mục đích học tập.
