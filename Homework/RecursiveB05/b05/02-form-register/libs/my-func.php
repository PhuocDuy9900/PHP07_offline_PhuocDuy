<?php
function createSelectbox($name, $data, $keySelect = 'default')
{
    $xhtml       = '';
    $classSelect = '';
    $xhtml .= sprintf('<div class="rs-select2 js-select-simple select--no-search">
                            <select name="%s">
                    ', $name);
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
    $xhtml .= ' </select>
                <div class="select-dropdown"></div> 
            </div>
                ';
    return $xhtml;
}


// <div class="rs-select2 js-select-simple select--no-search">
//      <select name="class">
//          <option disabled="disabled" selected="selected">Class</option>
//          <option>Class 1</option>
//          <option>Class 2</option>
//          <option>Class 3</option>
//      </select>
//      <div class="select-dropdown"></div>
// </div>

function createInput($type, $name, $class, $placeholder = 'Enter here')
{
    $xhtml = '';

    $xhtml = sprintf('<input class="%s" type="%s" placeholder="%s" name="%s">', $class, $type, $placeholder, $name);
    return $xhtml;
}
