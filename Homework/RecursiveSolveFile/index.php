<!-- File tree demo -->
<!-- <ul>
    <li>D: abc
        <ul>
            <li>D: abcchilds
                <ul>
                    <li>F: abcchilds1.txt</li>
                    <li>F: abcchilds2.txt</li>
                </ul>
            </li>
            <li>F: abc1.txt</li>
            <li>F: abc2.txt</li>
        </ul>
    </li>
    <li>D: child
        <ul>
            <li>D: xyzchilds
                <ul>
                    <li>F: xyzchilds1.txt</li>
                </ul>
            </li>
            <li>F: xyz1.txt</li>
            <li>F: xyz2.txt</li>
        </ul>
    </li>
    <li>D: files
        <ul>
            <li>F: files.txt</li>
        </ul>
    </li>
    <li>D: images</li>
    <li>F: index.php</li>
    <li>F: test.txt</li>
</ul> -->

<!-- Xu li = php -->
<?php

function recursiveFile($path, &$xhtml)
{
    $data  = scandir($path);

    $xhtml .= '<ul>';
    foreach ($data as $key => $value) {
        if ($value != '.' && $value != '..') {
            $dir = $path . '/' . $value;
            if (is_dir($dir)) {
                $xhtml .= '<li>D: ' . $value;
                recursiveFile($dir, $xhtml);
                $xhtml .= '</li>';
            } else {
                $xhtml .= '<li>F: ' . $value . ' </li>';
            }
        }
    }
    $xhtml .= '</ul>';
    return $xhtml;
}
echo recursiveFile('.', $xhtml);






// Anh cho em hoi tai sao no khong sap xep nhu tren demo