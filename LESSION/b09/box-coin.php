<?php
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
  'start' => '1',
  'limit' => '10',
  'convert' => 'USD'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: 04327361-d488-4732-8a71-51d5bb1f58cd'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers 
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
$data     = json_decode($response,true);
$data     = $data['data'];
// echo '<pre>';
// print_r($data);
// echo '</pre>';
$xhtml    = '';
foreach($data as $value) {
    $xhtml .= sprintf(' <tr>
                            <td>%s</td>', $value['name']);
    foreach($value['quote'] as $usdList) {
        $xhtml .= sprintf(' <td>%s%s</td>
                            <td><span class="text-success">%s%s</span></td>
                        </tr>', '$', round($usdList['price'],2), round($usdList['percent_change_24h'],1), '%');
    }
}

curl_close($curl); // Close request
?>

<h3 class="mb-1">Giá coin</h3>
<div class="card card-body">
    <table class="table table-sm">
        <thead>
            <tr>
                <th><b>Name</b></th>
                <th><b>Price</b></th>
                <th><b>Change (24h)</b></th>
            </tr>
        </thead>
        <tbody>
            <?=$xhtml?>
        </tbody>
    </table>
</div>