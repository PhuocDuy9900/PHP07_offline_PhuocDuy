<?php 
    require_once 'data.php';

    $xhtml = '<ul class="dropDownMenu">';
    $menuCurrent = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        
        if(isset($menuLevelOne['child'])){

            $xhtml .= sprintf('<li data-name="%s"><a href="%s">%s</a><ul>', $keyLevelOne, $menuLevelOne['link'],  $menuLevelOne['name']);
            
            foreach($menuLevelOne['child'] as $menuLevelTwo){
                if(isset($menuLevelTwo['child'])) {
                    $xhtml .= sprintf('<li data-parent="%s"><a href="%s">%s</a><ul>', $keyLevelOne, $menuLevelTwo['link'],  $menuLevelTwo['name']);

                    foreach($menuLevelTwo['child'] as $menuLevelThree){
                        $xhtml .= sprintf('<li data-parent="%s"><a href="%s">%s</a></li>', $keyLevelOne,  $menuLevelThree['link'],  $menuLevelThree['name']);
                    }
                    $xhtml .= '</ul></li>';
                }else {
                    $xhtml .= sprintf('<li data-parent="%s"><a href="%s">%s</a></li>',  $keyLevelOne, $menuLevelTwo['link'],  $menuLevelTwo['name']);
                }
            }

            $xhtml .= '</ul></li>';
        }else {
            
            $xhtml .= sprintf('<li data-name="%s"><a href="%s">%s</a></li>',  $keyLevelOne, $menuLevelOne['link'],  $menuLevelOne['name']);
        }
    }
    $xhtml .= '</ul>';
    
    
?>


<div class="menuBackground">
    <div class="center">
    <?php echo $xhtml; ?>
    </div>
</div>