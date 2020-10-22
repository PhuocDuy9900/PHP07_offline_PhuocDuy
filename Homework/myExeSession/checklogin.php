<?php
session_start();
$uid = $_POST['uid'];
$pw = $_POST['pw'];
if ($uid == 'adm' and $pw == 'adm') {
    $_SESSION['sid'] = '$uid'; # need to set user id instead of session_id()
    if (isset($_SESSION['sid'])) {
        header('Location: securepage.php');
    } else {
        echo "Error";
    }
} else {
    echo 'login false';
}
