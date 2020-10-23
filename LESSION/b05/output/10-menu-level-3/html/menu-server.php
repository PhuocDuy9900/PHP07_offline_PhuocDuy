<?php 
    require_once 'data.php';

    $xhtml = '<ul class="dropDownMenu">';
    $menuCurrent = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        $classActive = "";

        if(isset($menuLevelOne['child'])){

            
            if($menuCurrent == $keyLevelOne) $classActive = 'class="active"';
            if(isset($menuLevelOne['child'][$menuCurrent])) $classActive = 'class="active"';

            foreach ($menuLevelOne['child'] as $menuLevelTwo) {
                if(isset($menuLevelTwo['child'][$menuCurrent])) $classActive = 'class="active"';
            }

            $xhtml .= sprintf('<li %s><a href="%s">%s</a><ul>',   $classActive, $menuLevelOne['link'],  $menuLevelOne['name']);
            

            // 2
            foreach($menuLevelOne['child'] as $menuLevelTwo){
                if(isset($menuLevelTwo['child'])) {
                    $xhtml .= sprintf('<li><a href="%s">%s</a><ul>',  $menuLevelTwo['link'],  $menuLevelTwo['name']);

                    foreach($menuLevelTwo['child'] as $menuLevelThree){
                        $xhtml .= sprintf('<li ><a href="%s">%s</a></li>',  $menuLevelThree['link'],  $menuLevelThree['name']);
                    }
                    $xhtml .= '</ul></li>';
                }else {
                    $xhtml .= sprintf('<li><a href="%s">%s</a></li>',  $menuLevelTwo['link'],  $menuLevelTwo['name']);
                }
            }

            $xhtml .= '</ul></li>';
        }else {
            if($menuCurrent == $keyLevelOne) $classActive = 'class="active"';
            $xhtml .= sprintf('<li %s><a href="%s">%s</a></li>',  $classActive, $menuLevelOne['link'],  $menuLevelOne['name']);
        }
    }
    $xhtml .= '</ul>';
    
    
?>


<div class="menuBackground">
    <div class="center">
    <?php echo $xhtml; ?>
    </div>
</div>