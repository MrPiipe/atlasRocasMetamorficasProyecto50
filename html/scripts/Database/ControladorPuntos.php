<?php

require "../predis/autoload.php";
require '../metadata_getter_controller.php';
require '../bits_getter_controller.php';
Predis\Autoloader::register();

$redis   = new Predis\Client();

$ids = $redis->Lrange('itemIds', 0, -1);
$mapArray = array();
for ($i = 0; $i < count($ids);$i++) {
    $imgArray              = $redis->Lrange('itemIdThumbns', $i, $i);
    $mapArray['img'][$i]  = getBitstreamThumbUrl($imgArray[0]);
    $mapArray['name'][$i] = $redis->Lrange('itemNames', $i, $i);
    $mapArray['codigo'][$i]  = $redis->Lrange('itemIds', $i, $i);
    $mapArray['longitud'][$i] = $redis->Lrange('Longitudes', $i, $i);
    $mapArray['latitud'][$i] = $redis->Lrange('Latitudes', $i, $i);
    $mapArray['zona'][$i] = $redis->Lrange('Zones', $i, $i);
}
echo json_encode($mapArray);
