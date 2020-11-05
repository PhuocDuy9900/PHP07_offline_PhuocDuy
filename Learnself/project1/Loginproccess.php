<?php
session_start();
require_once('SQL/conn.php');
if(isset($_POST['login'])) {
    $emailLogin = $_POST['email'];
    $passLogin = $_POST['pass'];

    $sql = 'SELECT email, passwork, permission FROM infomation';
    $result = mysqli_query($conn,$sql);
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            if($emailLogin == $row[0] && $passLogin == $row[1]) {
                if($row[2] == 1) {
                    $_SESSION['email'] =  $emailLogin;
                    $_SESSION['role']  = $row[2];
                    header('location: admin.php');
                } else {
                    $_SESSION['email'] =  $emailLogin;
                    $_SESSION['role']  = $row[2];
                    header('location: member.php');
                }
            }
        }
    }
}