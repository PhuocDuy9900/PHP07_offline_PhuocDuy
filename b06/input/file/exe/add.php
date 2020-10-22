<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>PHP FILE - ADD</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#cancel-button').click(function() {
				window.location = 'index.php';
			});
		});
	</script>
</head>

<body>
	<?php
	require_once 'define.php';
	require_once 'functions.php';
	error_reporting(E_ALL & ~E_NOTICE);
	$flag	= false;
	if (isset($_POST['title']) && isset($_POST['description'])) {
		$title			= $_POST['title'];
		$description	= $_POST['description'];
		$fileUpload		= $_FILES['image'];

		$configs = parse_ini_file('config.ini');


		// Error Title
		$errorTitle = '';
		if (checkEmpty($title)) 			$errorTitle = '<p class="error">Dữ liệu không được rỗng</p>';
		if (checkLength($title, 5, 100)) 	$errorTitle .= '<p class="error">Tiêu đề dài từ 5 đến 100 ký tự</p>';

		// Error Description
		$errorDescription = '';
		if (checkEmpty($description)) 			 $errorDescription = '<p class="error">Dữ liệu không được rỗng</p>';
		if (checkLength($description, 10, 5000)) $errorDescription .= '<p class="error">Nội dung dài từ 10 đến 5000 ký tự</p>';

		// Error Title
		$errorImage = '';
		if (empty($fileUpload['name'])) {
			$errorImage = '<p class="error">Chưa có hình ảnh</p>';
		} else {
			// Kiem tra size, extention
			$flagSize 		= checkSize($fileUpload['size'], $configs['min_size'], $configs['max_size']);
			$flagExtension 	= checkExtension($fileUpload['name'], explode('|', $configs['extension']));

			if (!$flagSize) 		$errorImage .= '<p class="error">Dung lượng hình ảnh không hợp lệ</p>';
			if (!$flagExtension) $errorImage .= '<p class="error">Extention không hợp lệ</p>';
		}

		// A-Z, a-z, 0-9: AzG09
		if ($errorTitle == '' && $errorDescription == '' && $errorImage == '') {
			$name 		= randomString(5);
			$imageName  = randomStringFile($fileUpload['name'],7);
			$data		= $title . '||' . $description . '||' . $imageName;
			$filename	= DIR_FILES . $name . '.txt';
			move_uploaded_file($fileUpload['tmp_name'],DIR_IMAGES.$imageName);
			if (file_put_contents($filename, $data)) {
				$title			= '';
				$description	= '';
				$flag			= true;
			}
		}
	}
	?>
	<div id="wrapper">
		<div class="title">PHP FILE - ADD</div>
		<div id="form">
			<form action="#" method="post" name="add-form" enctype="multipart/form-data">
				<div class="row">
					<p>Title</p>
					<input type="text" name="title" value="<?= $title?>">
					<?= $errorTitle; ?>
				</div>

				<div class="row">
					<p>Description</p>
					<textarea name="description" rows="5" cols="100"><?= $description; ?></textarea>
					<?= $errorDescription ?>
				</div>

				<div class="row">
					<p>Image</p>
					<input type="file" name="image">
					<?= $errorImage ?>
				</div>

				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
				</div>

				<?php
				if ($flag == true) echo '<div class="row"><p>Dữ liệu đã được ghi thành công!</p></div>';
				?>

			</form>
		</div>

	</div>
</body>

</html>