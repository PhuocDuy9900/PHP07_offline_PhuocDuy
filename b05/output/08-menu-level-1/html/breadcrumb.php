<?php
require_once("data.php");

$xhtmlBreadcrumb = '';
if ($menuCurrent == 'index') {
    $xhtmlBreadcrumb = '<span>Home</span>';
} else {
    $xhtmlBreadcrumb = '
    <a href="index.php">Home</a>
    <span>></span>
    <span>' . $currentBreadCrumb[0] . '</span>
    ';
}

?>

<div class="breadcrumb">
    <?php echo $xhtmlBreadcrumb; ?>
</div>