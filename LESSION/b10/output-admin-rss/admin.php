<?php
session_start();
require_once 'define.php';
$rssLink = '';
$message = '';
if ($_SESSION['flagPermission'] == true) {
    $data = simplexml_load_file(DIR_DATA . 'timeout.xml');
    $timeout = $data->timeout;
    if (!($_SESSION['timeout'] + $timeout > time())) {
        session_unset();
        header('location: login.php');
        exit();
    }

    $rssLink = file_get_contents(DIR_DATA . 'rss.txt');

    if (isset($_POST['link-rss'])) {
        $link = $_POST['link-rss'];
        if (empty($link)) {
            $message = '<h4 class="alert alert-danger">Vui lòng nhập dữ liệu!</h4>';
        } else {
            file_put_contents(DIR_DATA . 'rss.txt', $link);
            $rssLink = $link;
            $message = '<h4 class="alert alert-success">Cập nhật thành công!</h4>';
        }
    }
} else {
    session_unset();
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Content
		============================================= -->
        <section id="content" class="w-100">
            <div class="content-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <a href="index.php" class="button button-3d button-green">Về website</a>
                            <a href="logout.php" class="button button-3d button-red">Đăng xuất</a>
                        </div>
                    </div>
                    <?php echo $message ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <h4 class="mb-2">Link RSS</h4>
                            <textarea class="sm-form-control" id="link-rss" name="link-rss" rows="8" cols="30"><?php echo $rssLink ?></textarea>
                        </div>
                        <?php
                        if ($_SESSION['role'] == 'admin') {
                            echo '<div class="form-group"><button class="button button-3d m-0" type="submit">Lưu</button></div>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </section><!-- #content end -->

    </div><!-- #wrapper end -->

    <?php require_once 'html/script.php' ?>

</body>

</html>