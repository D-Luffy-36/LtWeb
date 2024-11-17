<?php
// Thông tin kết nối
$host = "localhost"; // Máy chủ cơ sở dữ liệu
$username = "root";  // Tên người dùng
$password = "123456789";      // Mật khẩu (thường là rỗng cho localhost)
$dbname = "fruitable"; // Tên cơ sở dữ liệu
$port = 3309;

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
//echo "Kết nối thành công!";
