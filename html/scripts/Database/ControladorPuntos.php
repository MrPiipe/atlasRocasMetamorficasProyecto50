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
    Predis\Autoloader::register();

    $redis   = new Predis\Client();

    $ids = $redis->Lrange('ItemIds', 0, -1);
    $mapArray = array();
    foreach ($ids as $id) {
        $mapArray['name'][$i] = $redis->Lrange('ItemNames', $i, $i);
        $mapArray['ids'][$i]  = $redis->Lrange('ItemIds', $i, $i);
        $mapArray['longitude'][$i] = $redis->Lrange('longitude', $i, $i);
        $mapArray['latitude'][$i] = $redis->Lrange('Latitude', $i, $i);
        $mapArray['zone'][$i] = $redis->Lrange('Zone', $i, $i);
    }
    echo json_encode($mapArray);
