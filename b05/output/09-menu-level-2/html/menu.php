<?php require_once('html/head.php') ?>
<?php 
    require_once 'data.php';
    

    $xhtml = '<ul class="dropDownMenu">';
    foreach ($arrMenu as $keyMenuLevelOne => $menuLevelOne) {
        if(isset($menuLevelOne['child'])){
            $xhtml .= sprintf('<li data-name="%s"><a href="%s">%s</a><ul>',  $keyMenuLevelOne, $menuLevelOne['link'],  $menuLevelOne['name']);
            
            foreach($menuLevelOne['child'] as $menuLevelTwo){
                $xhtml .= sprintf('<li data-parent="%s"><a href="%s">%s</a></li>',  $keyMenuLevelOne, $menuLevelTwo['link'],  $menuLevelTwo['name']);
            }

            $xhtml .= '</ul></li>';
        }else {
            $xhtml .= sprintf('<li data-name= "%s"><a href="%s">%s</a></li>',   $keyMenuLevelOne, $menuLevelOne['link'],  $menuLevelOne['name'] );
        }
    }
    $xhtml .= '</ul>';
?>


<div class="menuBackground">
    <div class="center">
    <?php echo $xhtml; ?>
    
    
    </div>
</div>