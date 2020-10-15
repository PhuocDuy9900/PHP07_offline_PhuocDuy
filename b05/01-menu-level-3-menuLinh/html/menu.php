<?php
require_once('data.php');

$xhtml       = '';


// tao menu
foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
    if (isset($menuLevelOne['child'])) {

        $xhtml .= sprintf('<li data-name="%s"><a href="%s">%s</a><ul>', $keyLevelOne, $menuLevelOne['link'], $menuLevelOne['name']);
        foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            if (isset($menuLevelTwo['child'])) {

                $xhtml .= sprintf('<li data-parent="%s"><a href="%s">%s</a><ul>', $keyLevelOne, $menuLevelTwo['link'], $menuLevelTwo['name']);

                foreach ($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
                    $xhtml .= sprintf('<li data-parent="%s"><a href="%s">%s</a></li>', $keyLevelOne, $menuLevelThree['link'], $menuLevelThree['name']);
                }
                $xhtml .= '</ul></li>';
            } else {
                $xhtml .= sprintf('<li data-parent="%s"><a href="%s">%s</a></li>', $keyLevelOne, $menuLevelTwo['link'], $menuLevelTwo['name']);
            }
        }
        $xhtml .= '</ul></li>';
    } else {
        $classActive = ($menuCurrent == $keyLevelOne) ? 'class="active"' : '';
        $xhtml .= sprintf('<li data-name="%s"><a href="%s">%s</a></li>', $keyLevelOne, $menuLevelOne['link'], $menuLevelOne['name']);
    }
}
?>

<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?php echo $xhtml; ?>
        </ul>
    </div>
</div>