<?php
require "predis/autoload.php";
include "collections_getter_controller.php";
include "metadata_getter_controller.php";
include "bits_getter_controller.php";
include "invertedIndex.php";
Predis\Autoloader::register();

try {
    $redis = new Predis\Client();

    // This connection is for a remote server
    /*
    $redis = new PredisClient(array(
    "scheme" => "tcp",
    "host" => "153.202.124.2",
    "port" => 6379
    ));
     */

    /*
    Bloque de actualizar los Ids de los items de una coleccion
     */

    $redis->del('itemIds');
    $itemIds = getCollectionitemIds('6');
    $redis->rpush('itemIds', $itemIds);
    echo("Ids Actualizados\n");

    /*
    Bloque de actualizar los Nombres de los items de una coleccion
     */

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

    /*
    Bloque de actualizar las Fechas de los items de una coleccion
     */

    $redis->del('itemDates');

    foreach ($itemIds as $i) {
        $redis->rpush('itemDates', getitemDate($i));
    }
    echo("Fechas Actualizadas\n");

    /*
    Bloque de actualizar los IDs de los Thumbnails de los items de una coleccion
     */

    $redis->del('itemIdThumbns');

    foreach ($itemIds as $i) {
        if ((getBitstreamIdThumb($i))!=0) {
            $redis->rpush('itemIdThumbns', getBitstreamIdThumb($i));
        } else {
            $redis->rpush('itemIdThumbns', '0');
        }
    }
    echo("IDs de Thumbnails Actualizadas\n");

    /*
    Bloque de actualizar los Thumbnails de los items de una coleccion
     */

    $redis->del('itemThumbns');
    $thumbIds = $redis->Lrange('itemIdThumbns', 0, -1);
    foreach ($thumbIds as $i) {
        $redis->rpush('itemThumbns', getBitstreamThumb($i));
    }
    echo("Thumbnails Actualizadas\n");
    /*
    Bloque de actualizar las longitudes de los items de una coleccion
     */
    $redis->del('Longitudes');
    $itemIds = getCollectionitemIds('6');

    foreach ($itemIds as $i) {
        $redis->rpush('Longitudes', getLongitude($i));
    }
    echo("Longitudes Actualizadas\n");
    /*
    Bloque de actualizar las latitudes de los items de una coleccion
     */
    $redis->del('Latitudes');
    $itemIds = getCollectionitemIds('6');

    foreach ($itemIds as $i) {
        $redis->rpush('Latitudes', getLatitude($i));
    }
    echo("Latitudes Actualizadas\n");
    /*
    Bloque de actualizar las zonas de los items de una coleccion
     */
    $redis->del('Zones');
    $itemIds = getCollectionitemIds('6');

    foreach ($itemIds as $i) {
        $redis->rpush('Zones', getZone($i));
    }
    echo("Zonas Actualizadas\n");
} catch (Exception $e) {
    die($e->getMessage());
}
