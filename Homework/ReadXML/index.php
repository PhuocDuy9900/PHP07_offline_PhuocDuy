<?php
$url = "http://www.sjc.com.vn/xml/tygiavang.xml";
$xml = simplexml_load_file($url);

$array = json_decode(json_encode((array)$xml), TRUE);
// HCM
$array = $array['ratelist']['city'][0]['item'];
$data = [];
foreach($array as $value) {
    $data[] = $value['@attributes'];
}
echo '<pre>';
print_r($data);
echo '</pre>';