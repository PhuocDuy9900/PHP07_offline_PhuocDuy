<?php
require_once('data.php');

$xhtmlMenu   = '';
$classActive = '';

foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
    if (isset($menuLevelOne['child'])) {
        $classActive = ($keyLevelOne == $menuCurrent) ? 'class="active"':''; 

        if(isset($menuLevelOne['child'][$menuCurrent])) $classActive = 'class="active"';
        
        $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a><ul>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);

        foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a></li>', $classActive, $menuLevelTwo['link'], $menuLevelTwo['name']);
        }

        $xhtmlMenu .= '</ul></li>';
    } else {
        $classActive = ($keyLevelOne == $menuCurrent) ? 'class="active"':''; 
        $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a></li>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);
    }
}
?>

<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?php echo $xhtmlMenu; ?>
        </ul>
    </div>
</div>