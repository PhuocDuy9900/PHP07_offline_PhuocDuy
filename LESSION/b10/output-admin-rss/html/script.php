<script src="js/jquery.js"></script>
<script src="js/plugins.min.js"></script>
<script src="js/plugins.infinitescroll.js"></script>
<script src="js/tagify.min.js"></script>
<script src="js/me.js"></script>

<!-- Footer Scripts -->
<script src="js/functions.js"></script>

<!-- ADD-ONS JS FILES -->
<script>
    // Infinity Scroll
    jQuery(window).on('load', function() {

        var $container = $('.infinity-wrapper');

        $container.infiniteScroll({
            path: '.load-next-posts',
            history: false,
            status: '.page-load-status',
        });

        $container.on('load.infiniteScroll', function(event, response, path) {
            var $items = $(response).find('.infinity-loader');
            // append items after images loaded
            $items.imagesLoaded(function() {
                $container.append($items);
                $container.isotope('insert', $items);
                setTimeout(function() {
                    SEMICOLON.initialize.resizeVideos();
                    SEMICOLON.initialize.lightbox();
                    SEMICOLON.widget.loadFlexSlider();
                }, 1000);
            });
        });

    });
</script>