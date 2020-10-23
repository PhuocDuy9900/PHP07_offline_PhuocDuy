<?php
function createInput($type, $name, $class, $placeholder = 'Enter here')
{
    $xhtml = '';

    $xhtml = sprintf('<input class="%s" type="%s" placeholder="%s" name="%s">', $class, $type, $placeholder, $name);
    return $xhtml;
}
// input--style-2
require_once 'data.php';

function createSelectBox($class, $data, $keySelect = "default")
{
    $xhtml  = '';
    $classSelect = '';
    $xhtml .= sprintf('<select name="%s">',$class);
    foreach ($data as $key => $value) {
        if($key == 'default') {
            $classSelect = 'disabled="disabled" selected="selected"';
            $xhtml      .= sprintf('<option value="%s" %s>%s</option>',$key,$classSelect,$value);
            $classSelect = '';
        } else if ($keySelect == $key) {
            $classSelect = 'selected="selected"';
            $xhtml      .= sprintf('<option value="%s" %s>%s</option>',$key,$classSelect,$value);
            $classSelect = '';
        } else {
            $xhtml      .= sprintf('<option value="%s" %s>%s</option>',$key,$classSelect,$value);
        }
    }
    $xhtml .= '</select>';
    return $xhtml;
}
