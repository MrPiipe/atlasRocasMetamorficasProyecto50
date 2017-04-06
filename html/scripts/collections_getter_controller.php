<?php

$xml = simplexml_load_file('../scripts/getter_config.xml');

/*
    Este es el controlador que realizas los 'GET's de las colecciones.
    Nombre de la colleccion
    Parent community de la colleccion
    Nombre de los items de la colleccion
*/

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'ids':
            echo json_encode(getCollectionNumItems($_POST['id']));
        break;
    }
}

function getCollectionName($id_req)
{ //Recibe el ID de la coleccion y devuelve el nombre de la coleccion
    $json_output = json_decode(getJSONCollections($id_req, 1), true);
    return $json_output['name'];
}
function getParentcommunity($id_req)
{ //Recibe el ID de la coleccion y devuelve la comunidad padre de la coleccion
    $json_output = json_decode(getJSONCollections($id_req, 1), true);
    return $json_output['parentCommunity'];
}
function getCollectionNames($id_req)
{ //Recibe el ID de la coleccion y devuelve todos los items de la coleccion
    $json_output = json_decode(getJSONCollections($id_req, 2), true);
    $idItems = array();
    foreach ($json_output as $key) {
        $idItems[] = $key['name'];
    }
    return $idItems;
}

function getCollectionItemIds($id_req)
{
    $json_output = json_decode(getJSONCollections($id_req, 2), true);
    $idItems = array();
    foreach ($json_output as $var) {
        $idItems[] = $var['id'];
    }
    return $idItems;
}

function getCollectionNumItems($id_req)
{
    $json_output = json_decode(getJSONCollections($id_req, 1), true);
    return $json_output['numberItems'];
}
function getJSONCollections($id_req, $i)
{
    set_time_limit(0);
    $client = new http\Client;
    $request = new http\Client\Request;
    switch ($i) {
        case '1':
            $request->setRequestUrl((string)$GLOBALS['xml']->request->request_url.'/collections/'.$id_req);
            break;
        case '2':
            $request->setRequestUrl((string)$GLOBALS['xml']->request->request_url.'/collections/'.$id_req.'/items');
            break;
        default:
            $request->setRequestUrl((string)$GLOBALS['xml']->request->request_url.'/collections/'.$id_req);
            break;
    }
    $request->setRequestMethod((string)$GLOBALS['xml']->request->request_method);
    $request->setHeaders(array(
      'postman-token' => (string)$GLOBALS['xml']->request->header_token, //Quizas hay que cambiarlo (?) No estoy seguro
      'cache-control' => (string)$GLOBALS['xml']->request->header_cache,
      'authorization' => (string)$GLOBALS['xml']->request->header_auth //Se tendra que cambiar en cierto punto por la autorizacion de la cuenta (?)
    ));

    $client->enqueue($request)->send();
    $response = $client->getResponse();
    return $response->getBody();
}
//Codigo de prueba
//getCollectionName('6');
//echo "\n";
//print_r(getCollectionItemIds('6'));
//echo "\n";
