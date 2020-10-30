<?php
session_start();
$xml     = simplexml_load_file("data/timeout.xml");
$timeout = $xml->timeout;

if (count($_SESSION) == 0) {
    header('location: login.php');
} else {
    if ($_SESSION['role'] == 'member') {
        header('location: member.php');
    } else {
        if (isset($_POST['submit'])) {
            $xml     = simplexml_load_file("data/timeout.xml");
            $xml->timeout = $_POST['timeout'];
            $handle = fopen("data/timeout.xml","wb");
            fwrite($handle, $xml->asXML());
            fclose($handle);
            $timeout = $xml->timeout;
        }
        echo
            '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
        <html>
        
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <title>Login</title>
        </head>
        
        <body>
            <div id="wrapper">
                <div class="title">LOGIN</div>
                <div id="form">
                    <form action="#" method="post" name="edit-form">
                    <h2>Xin chào ' . $_SESSION['fullName'] . '</h2>
                        <div class="row">
                            <p>Timeout</p>
                            <input type="text" value="' . $timeout . '" name="timeout" />
                        </div>
        
                        <div class="row">
                            <input type="submit" value="Edit" name="submit">
                        </div>
                    </form>
                    <div class="row">
                        <a href="logout.php">Đăng xuất</a>
                    </div>
                </div>
        
            </div>
        </body>
        
        </html>';
    }
}


