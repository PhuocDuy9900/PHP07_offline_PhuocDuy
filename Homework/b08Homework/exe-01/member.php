<?php
session_start();
$xml     = simplexml_load_file("data/timeout.xml");
$timeout = $xml->timeout;
if (count($_SESSION) == 0) {
    header('location: login.php');
} else {
    if($_SESSION['role'] == 'admin') {
        header('location: admin.php');
    } else {
        echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
        echo '<h3>Thời gian đăng nhập của bạn là: ' . $timeout . '</h3>';
        echo '<a href="logout.php">Đăng xuất</a>';
    }
}