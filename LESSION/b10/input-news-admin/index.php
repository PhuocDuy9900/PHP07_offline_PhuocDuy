<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body class="stretched overlay-menu">

    <div id="wrapper" class="clearfix bg-light">
        <?php require_once 'html/header.php' ?>
        
        <div class="container">
            <div class="row">
                <!-- Content -->
                <?php require_once 'list.php' ?>
                <!-- #content end -->

                <section class="right-side mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                require_once 'box-gold.php';
                                require_once 'box-coin.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <footer>
            <div id="copyrights" class="bg-dark dark">
                <div class="container clearfix">

                    <div class="row col-mb-30">
                        <div class="col-12 text-center text-muted">
                            Copyrights &copy; 2020 All Rights Reserved by ZendVN Inc.<br>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up rounded-circle"></div>

    <?php require_once 'html/script.php' ?>
</body>

</html>