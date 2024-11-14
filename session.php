<!-- Session store in server, it userd to across multil web page -->

<?php
session_start(); // Khởi động session

// Kiểm tra trạng thái đăng nhập
if (!isset($_SESSION['authenticate']) || $_SESSION['authenticate'] === false) {
    // Thực hiện hành động nếu người dùng chưa xác thực
    header("Location: login.php");
    exit();
}
if ($_SESSION['authenticate'] === true) {
    if ($_SESSION['role'] === "customer") {
        header("Location: ./Client/index.php");
        exit();
    }
    header("Location: ./Admin/index.php");
    exit();
}



// Nội dung tài nguyên chỉ dành cho người đã đăng nhập
// echo "Chào mừng, " . $_SESSION['email'] . "! Đây là nội dung tài nguyên bảo vệ.";
