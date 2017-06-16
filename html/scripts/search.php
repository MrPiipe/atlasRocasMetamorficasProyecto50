<?php

require "predis/autoload.php";
include '../scripts/bits_getter_controller.php';
Predis\Autoloader::register();
$redis = new Predis\Client();

$ids = $redis->Lrange('itemIds', 0, -1);
$names = $redis->Lrange('itemNames', 0, -1);
$dates = $redis->Lrange('itemDates', 0, -1);
$images = $redis->Lrange('itemIdThumbns', 0, -1);
$numIDs = count($redis->Lrange('itemIds', 0, -1));
$indexNames = $redis->zrange('itemIndexedNames', 0, -1);

$query = explode(' ', $_POST['query']);
$numQuery = count($query);

for ($i = 0, $k = 0; $i < $numIDs; $i++) {
    for ($j = 0; $j < $numQuery; $j++) {
        if (strripos($names[$i], $query[$j]) !== false) {
            $queryResult['name'][$k] = $names[$i];
            $queryResult['date'][$k] = $dates[$i];
            $queryResult['img'][$k] = getBitstreamThumb($images[$i], 1);
            $queryResult['ids'][$k] = $ids[$i];
            $k++;
        }
    }
}
echo json_encode($queryResult);
