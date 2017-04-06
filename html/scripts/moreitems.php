<?php

require "predis/autoload.php";
include '../scripts/bits_getter_controller.php';
Predis\Autoloader::register();

$pageNum = $_POST['pageNum'] * 9;
$redis   = new Predis\Client();

$idsArray = $redis->Lrange('itemIds', 0, -1);

for ($i = 0; $i < 9 && $idsArray[$pageNum] != null; $i++, $pageNum++) {
    $imgArray              = $redis->Lrange('itemIdThumbns', $pageNum, $pageNum);
    $dataArray['img'][$i]  = getBitstreamThumb($imgArray[0], 1);
    $dataArray['name'][$i] = $redis->Lrange('itemNames', $pageNum, $pageNum);
    $dataArray['date'][$i] = $redis->Lrange('itemDates', $pageNum, $pageNum);
    $dataArray['ids'][$i]  = $redis->Lrange('itemIds', $pageNum, $pageNum);
}
echo json_encode($dataArray);
