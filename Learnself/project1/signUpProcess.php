<?php
require_once('SQL/conn.php');
if(isset($_POST['signup'])) {
    $email = $_POST['email'];
    $pass = $_POST['psw'];
    $name  = $_POST['name'];
    $phone = $_POST['phone'];
    $permission = $_POST['permission'];
    $sql     = "INSERT INTO infomation (email, passwork, nameuser, phone, permission) VALUES ('$email', '$pass', '$name', '$phone', '$permission')";
    
    if(mysqli_query($conn,$sql)) {
        echo "<script>alert('New record created successful');</script>";
        header('location: index.php');
    }
}
?>