<?php

$xml = simplexml_load_file('getter_config.xml');

function getCommunityName($id_req){
    $json_output = json_decode(getJSONCommunities($id_req), true);
    echo $json_output['name'];
}
function getCommunityCollections($id_req){
    $json_output = json_decode(getJSONCommunities($id_req), true);
    echo $json_output['collections'];
}
function getSubcommunities($id_req){
    $json_output = json_decode(getJSONCommunities($id_req), true);
    echo $json_output['Subcommunities'];
}
function getParentcommunity($id_req){
    $json_output = json_decode(getJSONCommunities($id_req), true);
    echo $json_output['parentCommunity'];
}
function getJSONCommunities($id_req){
    $client = new http\Client;
    $request = new http\Client\Request;

    $request->setRequestUrl((string)$GLOBALS['xml']->request->request_url.'/communities/'.$id_req);
    $request->setRequestMethod((string)$GLOBALS['xml']->request->request_method);
    $request->setHeaders(array(
      'postman-token' => (string)$GLOBALS['xml']->request->header_token,
      'cache-control' => (string)$GLOBALS['xml']->request->header_cache,
      'authorization' => (string)$GLOBALS['xml']->request->header_auth
    ));

    $client->enqueue($request)->send();
    $response = $client->getResponse();
    return $response->getBody();
}
