<?php
require "predis/autoload.php";
include "collections_getter_controller.php";
include "metadata_getter_controller.php";
include "bits_getter_controller.php";
include "invertedIndex.php";
Predis\Autoloader::register();

try {
    $redis = new Predis\Client();

    $redis->del('itemIds');
    $itemIds = getCollectionitemIds('6');
    $redis->rpush('itemIds', $itemIds);
    echo("Ids Actualizados\n");

    $redis->del('itemNames');
    $redis->del('itemIndexedNames');
    foreach ($itemIds as $items) {
        $name = getName($items);
        $redis->rpush('itemNames', $name);
        $noSpecCharWords = removeSpecialCharacters($name);
        foreach ($noSpecCharWords as $words) {
            $redis->zadd('itemIndexedNames', 0, removeCommonWords($words));
        }
    }
    echo("Nombres Actualizados\n");

    $redis->del('itemDates');
    foreach ($itemIds as $i) {
        $redis->rpush('itemDates', getitemDate($i));
    }
    echo("Fechas Actualizadas\n");

    $redis->del('itemIdThumbns');
    foreach ($itemIds as $i) {
        if ((getBitstreamIdThumb($i))!=0) {
            $redis->rpush('itemIdThumbns', getBitstreamIdThumb($i));
        } else {
            $redis->rpush('itemIdThumbns', '0');
        }
    }
    echo("IDs de Thumbnails Actualizadas\n");

    $redis->del('itemThumbns');
    $thumbIds = $redis->Lrange('itemIdThumbns', 0, -1);
    foreach ($thumbIds as $i) {
        $redis->rpush('itemThumbns', getBitstreamThumb($i));
    }
    echo("Thumbnails Actualizadas\n");

    $redis->del('Longitudes');
    $itemIds = getCollectionitemIds('6');

    foreach ($itemIds as $i) {
        $redis->rpush('Longitudes', getLongitude($i));
    }
    echo("Longitudes Actualizadas\n");

    $redis->del('Latitudes');
    $itemIds = getCollectionitemIds('6');

    foreach ($itemIds as $i) {
        $redis->rpush('Latitudes', getLatitude($i));
    }
    echo("Latitudes Actualizadas\n");

    $redis->del('Zones');
    $itemIds = getCollectionitemIds('6');

    foreach ($itemIds as $i) {
        $redis->rpush('Zones', getZone($i));
    }
    echo("Zonas Actualizadas\n");
} catch (Exception $e) {
    die($e->getMessage());
}
