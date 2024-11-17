<?php
require "../connectDB.php";
session_start();
if (!isset($_SESSION['account']['email'])) {
    header("Location: ../login.php");
    exit;
}

$account = $_SESSION['account']['email'];
$accountId = $_SESSION['account']['id'];
$sql = "SELECT od.id AS order_id, od.status, od.price, od.date
        FROM accounts a
        JOIN orders od ON od.account_id = a.id
        WHERE a.id = $accountId";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Orders</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
            margin-top: 200px;
        }
    </style>
</head>

<body>
    <?php include "./layout/hearder.php" ?>;

    <table class="table">
        <h1 style="margin-top: 200px;">List Orders of account: <?php echo $account; ?></h1>
        <thead>
            <tr>
                <th>STT</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    // Tách riêng PHP logic khỏi chuỗi HTML
                    $status = ($row['status'] == 0) ? 'pending' : 'confirm';
                    echo "<tr>
                        <td>" . ++$i . "</td>
                        <td>{$row['order_id']}</td>
                        <td>{$status}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['date']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Không có đơn hàng nào.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </table>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/custom.js"></script>
</body>

</html>