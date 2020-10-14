<!-- File tree demo -->
<ul>
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
</ul>

<!-- Xu li = php -->
<?php
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
$data = scandir(".");
$xhtml = '';
$xhtml .= '<ul>';
foreach ($data as $key => $value) {
    if ($value != '.' && $value != '..') {
        if (is_dir($value)) {
            if (is_dir("./$value")) {
                $xhtml .= '<li>D: ' . $value . '<ul>';

                $dataChild = scandir("./$value");
                foreach ($dataChild as $keyC => $valueC) {
                    if ($valueC != '.' && $valueC != '..') {
                        if (is_dir("./$value/$valueC")) {
                            $xhtml .= '<li>D: ' . $valueC . '<ul>';

                            $dataChildChild = scandir("./$value/$valueC");
                            foreach ($dataChildChild as $keyCC => $valueCC) {
                                if ($valueCC != '.' && $valueCC != '..') {
                                    if ($valueC != '.' && $valueC != '..') {
                                        if (is_dir("./$value/$valueC/$valueCC")) {
                                            $xhtml .= '<li>D: ' . $valueCC . '<li>';
                                        } else {
                                            $xhtml .= '<li>F: ' . $valueCC . ' </li>';
                                        }
                                    }
                                }
                            }
                            $xhtml .= '</ul></li>';
                        } else {
                            $xhtml .= '<li>F: ' . $valueC . ' </li>';
                        }
                    }
                }
                $xhtml .= '</ul></li>';
            } else {
                $xhtml .= '<li>F: ' . $value . ' </li>';
            }
        } else {
            $xhtml .= '<li>F: ' . $value . ' </li>';
        }
    }
}
$xhtml .= '</ul>';
echo $xhtml;


// Anh cho em hoi tai sao no khong sap xep nhu tren demo