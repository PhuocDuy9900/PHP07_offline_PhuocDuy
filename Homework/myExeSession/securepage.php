<?php
session_start();
if (isset($_SESSION['sid'])) {
    echo "welcome to you<br>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    header('Location: login.php');
}
