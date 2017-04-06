<?php

$xml = simplexml_load_file('getter_config.xml');

/*
    Este es el controlador que realizas los 'GET's de las comunidades.
*/
function getCommunityName($id_req)
{ //Recibe el ID de la comunidad y devuelve el nombre de la comunidad
    $json_output = json_decode(getJSONCommunities($id_req), true);
    echo $json_output['name'];
}
function getCommunityCollections($id_req)
{ //Recibe el ID de la comunidad y devuelve las colecciones de la comunidad
    $json_output = json_decode(getJSONCommunities($id_req), true);
    echo $json_output['collections'];
}
function getSubcommunities($id_req)
{ //Recibe el ID de la comunidad y devuelve las sub comunidades de la comunidad
    $json_output = json_decode(getJSONCommunities($id_req), true);
    echo $json_output['Subcommunities'];
}
function getParentcommunity($id_req)
{ //Recibe el ID de la comunidad y devuelve la comunidad padre de la comunidad
    $json_output = json_decode(getJSONCommunities($id_req), true);
    echo $json_output['parentCommunity'];
}
function getJSONCommunities($id_req)
{
    $client = new http\Client;
    $request = new http\Client\Request;

    $request->setRequestUrl((string)$GLOBALS['xml']->request->request_url.'/communities/'.$id_req);
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
//getCommunityName("5");
//echo "\n";
