<?php
$str = file_get_contents('../hanhchinhvn-master\dist\quan_huyen.json');
$arr_district = json_decode($str, true);
$str = file_get_contents('../hanhchinhvn-master\dist\tinh_tp.json');
$arr_province = json_decode($str, true);
$arr_province = array_values($arr_province);

$data = [];
foreach($arr_district as $key=>$value)
{
  $obj = [];
  $obj['id'] = $value['code'];
  $obj['name'] = $value['name_with_type'];
  $obj['id_province'] = $value['parent_code'];
  
  array_push($data, $obj);
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);

// Write File
$response = $data;
$fp = fopen('../result/district.json', 'w');
fwrite($fp, json_encode($response, JSON_UNESCAPED_UNICODE));
fclose($fp);
echo json_encode($data, JSON_UNESCAPED_UNICODE);