<?php

header("Content-type: application/json");

$ch = curl_init();
$url = "https://caver.ir/%D8%AC%D9%88%D8%A7%D8%A8-%DA%A9%D8%A7%D9%85%D9%84-%D9%87%D9%85%D9%87-%D9%85%D8%B1%D8%A7%D8%AD%D9%84-%D8%A8%D8%A7%D8%B2%DB%8C-%D8%A2%D9%85%DB%8C%D8%B1%D8%B2%D8%A7/";
// تنظیم آدرس اینترنتی هدف
curl_setopt($ch, CURLOPT_URL, $url);
// تنظیم نتیجه در قالب یک رشته
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 5000);
$set = json_encode(curl_exec($ch), 1000);
curl_close($ch);

$web = json_decode($set, true);

preg_match_all('#<span style="(.*)">(.*)</span>#', $web, $amirza);

for ($i = 0; $i < count($amirza[2]); $i++) {
	$data = [$amirza[2][$i]];
	$array[] = $data;
	}
	
$nsin = count($amirza[2]);

$data = ['Ok'=>true, 'Number'=>$nsin, 'Res'=>$array];

echo json_encode($data, 5000);