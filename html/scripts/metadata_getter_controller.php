<?php

$xml = simplexml_load_file(dirname(__FILE__).'/getter_config.xml');
function getLongitude($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->longitude)) {
            return ($key["value"]);
        }
    }
}

function getLatitude($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->latitude)) {
            return ($key["value"]);
        }
    }
}

function getZone($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->zone)) {
            return ($key["value"]);
        }
    }
}

function getItemDate($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->article_date)) {
            return ($key["value"]);
        }
    }
}
function getName($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->name)) {
            return $key['value'];
        }
    }
}
function getLocation($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->location)) {
            echo $key['value'];
        }
    }
}
function getHeight($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->height)) {
            echo $key['value'];
        }
    }
}
function getId($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->id)) {
            echo $key['value'];
        }
    }
}
function getMacroDescription($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->desc_macro)) {
            echo $key['value'];
        }
    }
}
function getAuthor($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->author)) {
            echo $key['value'];
        }
    }
}
function getTextures($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->textures)) {
            echo $key['value'];
        }
    }
}
function getMicroDescription($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->desc_micro)) {
            echo $key['value'];
        }
    }
}
function getMetamorphism($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->metamorphism)) {
            echo $key['value'];
        }
    }
}
function getAfloramiento($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->afloramiento)) {
            echo $key['value'];
        }
    }
}
function getMineralDescription($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->desc_mineral)) {
            echo $key['value'];
        }
    }
}
function getIntraTexturesDescription($id_req){
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->desc_textures_intragranos)) {
            echo $key['value'];
        }
    }
}
function getJSON($id_req){
    set_time_limit(0);
    $client  = new http\Client;
    $request = new http\Client\Request;

    $request->setRequestUrl((string) $GLOBALS['xml']->request->request_url . '/items/' . $id_req . '/metadata');
    $request->setRequestMethod((string) $GLOBALS['xml']->request->request_method);
    $request->setHeaders(array(
        'postman-token' => (string) $GLOBALS['xml']->request->header_token,
        'cache-control' => (string) $GLOBALS['xml']->request->header_cache,
        'authorization' => (string) $GLOBALS['xml']->request->header_auth,
    ));

    $client->enqueue($request)->send();
    $response = $client->getResponse();
    return $response->getBody();
}
