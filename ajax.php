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

$post = json_encode($post);

$ch = curl_init('https://docs.intelipost.com.br/v1/cotacao/criar-cotacao-por-volume');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'api_key: 9009f95101bf48b01a50928a2a71ed1ae9083fc1d3c08439b0613dfc38e656c5',
    'Content-Type: application/json',
    'platform: intelipost-docs'
));

$response = curl_exec($ch);
curl_close($ch);

if ($response || $response != '') {
	$data = json_decode($response);
} else {
	echo 'False';
}
?>