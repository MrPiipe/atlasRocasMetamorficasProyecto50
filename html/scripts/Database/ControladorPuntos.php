<?php
//TODO: Implementar REDIS
/*
$bd = "atlasmetamorfico";
$server ="localhost";
$user = "root";
$password = "";

$conexion = @mysqli_connect($server, $user, $password, $bd);

if (! $conexion) {
    die("Error de conexion ".mysqli_connect_error());
}

$sql = "SELECT * FROM ATLAS_MAPA2";
$result = mysqli_query($conexion, $sql);
$array_user = array();
while ($data = mysqli_fetch_assoc($result)) {
    $array_user[] = $data;
}

echo json_encode($array_user);
*/
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
    // $mapArray['nombreR'][$i] = $redis->Lrange('itemNames', $i, $i);
    // $mapArray['ano'][$i] = getItemDate($ids[$i]);
    // $mapArray['macros'][$i] = getMacroDescription($ids[$i]);
    // $mapArray['micros'][$i] = getMicroDescription($ids[$i]);
    // $mapArray['textura'][$i] = getTextures($ids[$i]);
    // $mapArray['Afloramiento'][$i] = getAfloramiento($ids[$i]);
    // $mapArray['intragranos'][$i] = getIntraTexturesDescription($ids[$i]);
    // $mapArray['altitud'][$i] = getHeight($ids[$i]);
}
echo json_encode($mapArray);
