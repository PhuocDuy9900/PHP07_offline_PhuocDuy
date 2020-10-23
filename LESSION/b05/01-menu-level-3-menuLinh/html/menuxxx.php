<?php
require_once('data.php');

$xhtml       = '';
$classActive = '';
// lay gia tri keyLevelTwo de so sanh truoc khi tao the cha (about)


// tao menu
foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
    if (isset($menuLevelOne['child'])) {

        $classActive = ($menuCurrent == $keyLevelOne) ? 'class="active"' : '';

        if (isset($menuLevelOne['child'][$menuCurrent])) $classActive = 'class="active"';
        // foreach($active as $key => $value) {
        // echo '<pre>';
        // print_r($value);
        // echo '</pre>';
        //     if(isset($value[$menuCurrent])) $classActive = 'class="active"';
        // }
        foreach ($menuLevelOne['child'] as $menuLevelTwo) {
            if (isset($menuLevelTwo['child'][$menuCurrent])) $classActive = 'class="active"';
        }

        $xhtml .= sprintf('<li %s><a href="%s">%s</a><ul>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);
        foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            if (isset($menuLevelTwo['child'])) {

                $xhtml .= sprintf('<li><a href="%s">%s</a><ul>', $menuLevelTwo['link'], $menuLevelTwo['name']);

                foreach ($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
                    $xhtml .= sprintf('<li><a href="%s">%s</a></li>', $menuLevelThree['link'], $menuLevelThree['name']);
                }
                $xhtml .= '</ul></li>';
            } else {
                $xhtml .= sprintf('<li><a href="%s">%s</a></li>', $menuLevelTwo['link'], $menuLevelTwo['name']);
            }
        }
        $xhtml .= '</ul></li>';
    } else {
        $classActive = ($menuCurrent == $keyLevelOne) ? 'class="active"' : '';
        $xhtml .= sprintf('<li %s><a href="%s">%s</a></li>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);
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