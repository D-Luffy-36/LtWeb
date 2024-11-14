<?php
session_start();          // Bắt đầu session

session_unset();          // Xóa tất cả biến session
session_destroy();        // Hủy session

// Xóa cookie chứa ID session nếu có
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Chuyển hướng về trang đăng nhập hoặc trang chủ
header("Location: login.php");
exit();
