<?php
header("Access-Control-Allow-Origin: *"); 
$str = file_get_contents('../hanhchinhvn-master\dist\tinh_tp.json');
$arr_province = json_decode($str, true);

usort($arr_province, function($a, $b) {return strcmp($a['code'], $b['code']);});

$data = [];
foreach($arr_province as $key=>$value)
{
  $obj = [];
  $obj['id'] = $value['code'];
  $obj['name'] = $value['name_with_type'];
  array_push($data, $obj);
}

// Write File
$response = $data;
$fp = fopen('../result/province.json', 'w');
fwrite($fp, json_encode($response, JSON_UNESCAPED_UNICODE));
fclose($fp);
echo json_encode($data, JSON_UNESCAPED_UNICODE);