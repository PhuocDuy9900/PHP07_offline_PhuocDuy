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
                    <form action="" method="post">
                        <div class="form-group">
                            <h4 class="mb-2">Link RSS</h4>
                            <textarea class="required sm-form-control valid" id="link-rss" name="link-rss" rows="8" cols="30"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="button button-3d m-0" type="submit">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </section><!-- #content end -->

    </div><!-- #wrapper end -->

    <?php require_once 'html/script.php' ?>

</body>

</html>