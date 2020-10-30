<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Process</title>
</head>

<body>
	<div id="wrapper">
		<div class="title">PROCESS</div>
		<div id="form">
			<?php
			require_once 'functions.php';
			session_start();
			error_reporting(E_ALL ^ E_NOTICE);
			if ($_SESSION['flagPermission'] == true) {
				$xml     = simplexml_load_file("data/timeout.xml");
				$timeout = $xml->timeout;
				if ($_SESSION['timeout'] + $timeout > time()) {
					echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
					echo '<a href="logout.php">Đăng xuất</a>';
				} else {
					session_unset();
					header('location: login.php');
				}
			} else {
				if (!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])) {
					$username 	= $_POST['username'];
					$password 	= md5($_POST['password']);
					$data 		= file_get_contents('data/users.json');
					$data 		= json_decode($data, true);
					$userInfo   = [];
					foreach ($data as $userData) {
						if ($username == $userData['username'] && $password == $userData['password']) {
							$userInfo = $userData;
							break;
						}
					}
					if (!empty($userInfo)) {
						$_SESSION['fullName'] 		= $userInfo['fullname'];
						$_SESSION['role'] 			= $userInfo['role'];
						$_SESSION['flagPermission'] = true;
						$_SESSION['timeout'] 		= time();
						if ($userInfo['role'] == 'admin') {
							header('location: admin.php');
						} else if ($userInfo['role'] == 'member') {
							header('location: member.php');
						}
					} else {
						header('location: login.php');
					}
				} else {
					header('location: login.php');
				}
			}
			?>
		</div>

	</div>
</body>

</html>