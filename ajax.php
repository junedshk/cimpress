<?php
$ozc = $_REQUEST['ozc'];
$dzc = $_REQUEST['dzc'];
$weight = $_REQUEST['weight'];
$cog = $_REQUEST['cog'];
$width = $_REQUEST['width'];
$height = $_REQUEST['height'];
$length = $_REQUEST['length'];

$post = array(
    'origin_zip_code' => $ozc,
    'destination_zip_code' => $dzc,
    'volumes'   => array('weight' => $weight, 'volume_type' => 'BOX', 'cost_of_goods' => $cog,  'width' => $width, 'height' => $height, 'length' => $length)
);

/*$post = json_encode($post);

$ch = curl_init('https://api.intelipost.com.br/api/v1/quote');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'api_key: 9009f95101bf48b01a50928a2a71ed1ae9083fc1d3c08439b0613dfc38e656c5',
    'Content-Type: applicati1`on/json',
    'platform: intelipost-docs'
));

$response = curl_exec($ch);
var_dump($response);
curl_close($ch);

if ($response || $response != '') {
	$data = json_decode($response);
} else {
	echo 'False';
}*/


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.intelipost.com.br/api/v1/quote",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"origin_zip_code\": \"04012-090\",\n  \"destination_zip_code\": \"04037-003\",\n  \"volumes\": [\n    {\n      \"weight\": 0.5,\n      \"volume_type\": \"BOX\",\n      \"cost_of_goods\": 100,\n      \"width\": 10,\n      \"height\": 10,\n      \"length\": 25\n    }\n  ],\n  \"additional_information\": {\n    \"free_shipping\": false,\n    \"extra_cost_absolute\": 0,\n    \"extra_cost_percentage\": 0,\n    \"lead_time_business_days\": 0,\n    \"sales_channel\": \"hotsite\",\n    \"tax_id\": \"22337462000127\",\n    \"client_type\": \"gold\",\n    \"payment_type\": \"CIF\",\n    \"is_state_tax_payer\": false,\n    \"delivery_method_ids\": [\n      1,\n      2,\n      3\n    ]\n  },\n  \"identification\": {\n    \"session\": \"04e5bdf7ed15e571c0265c18333b6fdf1434658753\",\n    \"page_name\": \"carrinho\",\n    \"url\": \"http://www.intelipost.com.br/checkout/cart/\"\n  }\n}",
  CURLOPT_HTTPHEADER => array(
    "api_key: 9009f95101bf48b01a50928a2a71ed1ae9083fc1d3c08439b0613dfc38e656c5",
    "cache-control: no-cache",
    "content-type: application/json",
    "platform: intelipost-docs",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>