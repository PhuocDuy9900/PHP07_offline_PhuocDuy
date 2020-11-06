<div class="heading-block border-bottom-0 center pt-4 mb-3">
    <h3>Tin tức</h3>
</div>

<!-- Posts -->
<?php

$items = simplexml_load_file(
    "https://vnexpress.net/rss/suc-khoe.rss",
    null,
    LIBXML_NOCDATA
)->channel->item;

$xhtml = '';
foreach ($items as $value) {
    $title       = $value->title;
    $link        = $value->link;
    preg_match_all('#.*src="(.*)".*br>(.*)<end>#imsU', $value->description . '<end>', $match);
    $img         = $match[1][0];
    $description = $match[2][0];
    $time = new DateTime($value->pubDate);
    $time = $time->format('d/m/Y H:i:s');
    $xhtml      .= sprintf('<div class="col-md-6 p-3">
    <div class="entry mb-1 clearfix">
        <div class="entry-image mb-3">
            <a href="%s" data-lightbox="image" style="background: url(%s) no-repeat center center; background-size: cover; height: 278px;"></a>
        </div>
        <div class="entry-title">
            <h3><a href="%s">%s</a></h3>
        </div>
        <div class="entry-content">
            <p>%s</p>
        </div>
        <div class="entry-meta no-separator nohover">
            <ul class="justify-content-between mx-0">
                <li><i class="icon-calendar2"></i>%s</li>
                <li>vnexpress.net</li>
            </ul>
        </div>
        <div class="entry-meta no-separator hover">
            <ul class="mx-0">
                <li><a href="%s">Xem &rarr;</a></li>
            </ul>
        </div>
    </div>
</div>', $img, $img, $link, $title, $description, $time, $link);
}
?>
<div class="row grid-container infinity-wrapper clearfix">
    <?=$xhtml?>
</div>