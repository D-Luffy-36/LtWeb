<?php
require("connectDB.php");
// tìm tài khoản
function findAccountByEmailAndPassword($email, $password, $conn)
{
    $email = htmlspecialchars($email);  // Lấy giá trị của email
    $password = htmlspecialchars($password);

    // Câu truy vấn SQL
    $sql = "SELECT id, email, phone, avatar, address, role, avatar FROM accounts WHERE email = '$email' AND password = '$password'";

    // Thực hiện truy vấn và kiểm tra kết quả
    $result = $conn->query($sql);

    // Kiểm tra nếu câu truy vấn thực thi thành công
    if ($result === false) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    // Kiểm tra nếu có kết quả
    if ($result->num_rows > 0) {
        return $result->fetch_assoc(); // Trả về thông tin tài khoản
    } else {
        return []; // Không tìm thấy tài khoản
    }
}

function login($email, $password, $conn)
{
    // có điền thông tin và truyền lên khác rỗng

    $account = findAccountByEmailAndPassword($email, $password, $conn); // arr ass
    if (empty($account)) {
        return false;
    } else {
        session_start();
        $_SESSION['account']['id'] = $account['id'];
        $_SESSION['account']['email'] = $account['email'];
        $_SESSION['account']['phone'] = $account['phone'];
        $_SESSION['account']['address'] = $account['address'];
        $_SESSION['account']['avatar'] = $account['avatar'];
        $_SESSION['account']['role'] = $account['role'];
        return true;
    }
}

function session()
{
    if (!isset($_SESSION['account']['email'])) {
        header("Location: http://localhost/LtWeb/login.php");
        exit();
    } else {
        if ($_SESSION['account']['role'] === 'customer') {
            header("Location: http://localhost/LtWeb/Client/index.php");
        } else {
            header("Location: http://localhost/LtWeb/Admin/index.php");
        }
    }
}

function removeSessionByName($session_name)
{
    session_start();
    if (isset($_SESSION[$session_name])) {
        // Xóa biến session
        unset($_SESSION[$session_name]);
    }
}
