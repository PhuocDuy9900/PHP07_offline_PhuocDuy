<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body class="stretched overlay-menu">

    <div id="wrapper" class="clearfix bg-light">
        <?php require_once('html/header.php') ?>

        <div class="container">
            <div class="row">
                <!-- Content -->
                <section id="content" class="bg-light">
                    <div class="content-wrap pt-lg-0 pt-xl-0 pb-0">
                        <div class="container clearfix">
                            <?php require_once('news.php'); ?>
                        </div>
                    </div>
                </section>
                <!-- #content end -->
                <section class="right-side mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="box mt-4">
                                    <?php require_once('box-gold.php'); ?>
                                </div>
                                <div class="box mt-4">
                                    <?php require_once('box-coin.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php require_once('html/footer.php') ?>
    </div>

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up rounded-circle"></div>

    <?php require_once 'html/script.php' ?>
</body>

</html>