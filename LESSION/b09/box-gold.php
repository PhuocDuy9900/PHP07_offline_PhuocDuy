<?php
$url = "http://www.sjc.com.vn/xml/tygiavang.xml";
$xml = simplexml_load_file($url)->ratelist->city[0];

$array = json_decode(json_encode((array)$xml), TRUE);
$goldList = array_column($array['item'],'@attributes');
// array_column ~= 
// $data = [];
// foreach($array as $value) {
//     $data[] = $value['@attributes'];
// }
$xhtml = '';
foreach($goldList as $gold) {

    $xhtml .= sprintf(' <tr>
                            <td>%s</td>
                            <td>%s.000</td>
                            <td>%s.000</td>
                        </tr>', $gold['type'], $gold['buy'], $gold['sell']);
}
?>

<h3 class="mb-1">Giá vàng</h3>
<div class="card card-body">
    <table class="table table-sm">
        <thead>
            <tr>
                <th><b>Loại vàng</b></th>
                <th><b>Mua vào</b></th>
                <th><b>Bán ra</b></th>
            </tr>
        </thead>
        <tbody>
            <?=$xhtml?>
        </tbody>
    </table>
</div>