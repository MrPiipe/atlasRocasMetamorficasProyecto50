<?php

/*
Cuando los gets son llamados, estos usan el metodo getJSON (Codigo de Postman), para conseguir el JSON de el ID solicitado.
Usamos el JSON, lo recorremos y sacamos la informacion que necesitamos, ya sea la fecha, titulo, autor, etc...
Este realiza un "echo" que desplegara el valor solicitado.
Las funciones hacen lo siguiente:
Titulo del item
Fecha/año de recoleccion
Nombre/autor del recolector
Coordenadas de locacion
Codigo del item
Descripcion macroscopica
Descripcion microscopica
Tipo y grado de metamorfismo
Tipo de afloramiento
Textura general
Descripcion mineralogica
Descripcion de texturas intragranos

longitud
latitud
zona

 */

$xml = simplexml_load_file('../scripts/getter_config.xml');
function getLongitude($id_req)
{
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->longitude)) {
            return ($key["value"]);
        }
    }
}

function getLatitude($id_req)
{
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->latitude)) {
            return ($key["value"]);
        }
    }
}

function getZone($id_req)
{
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->zone)) {
            return ($key["value"]);
        }
    }
}

function getItemDate($id_req)
{
    //Fecha/año de recoleccion
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->article_date)) {
            return ($key["value"]);
        }
    }
}
function getName($id_req)
{
    //Titulo del item
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->name)) {
            return $key['value'];
        }
    }
}
function getLocation($id_req)
{
    //Coordenadas de locacion
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->location)) {
            echo $key['value'];
        }
    }
}
function getHeight($id_req)
{
    //Altura del item
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->height)) {
            echo $key['value'];
        }
    }
}
function getId($id_req)
{
    //Codigo del item
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->id)) {
            echo $key['value'];
        }
    }
}
function getMacroDescription($id_req)
{
    //Descripcion macroscopica
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->desc_macro)) {
            echo $key['value'];
        }
    }
}
function getAuthor($id_req)
{
    //Nombre/autor del recolector
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->author)) {
            echo $key['value'];
        }
    }
}
function getTextures($id_req)
{
    //Textura general
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->textures)) {
            echo $key['value'];
        }
    }
}
function getMicroDescription($id_req)
{
    //Descripcion microscopica
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->desc_micro)) {
            echo $key['value'];
        }
    }
}
function getMetamorphism($id_req)
{
    //Tipo y grado de metamorfismo
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->metamorphism)) {
            echo $key['value'];
        }
    }
}
function getAfloramiento($id_req)
{
    //Tipo de afloramiento
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->afloramiento)) {
            echo $key['value'];
        }
    }
}
function getMineralDescription($id_req)
{
    //Descripcion mineralogica
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->desc_mineral)) {
            echo $key['value'];
        }
    }
}
function getIntraTexturesDescription($id_req)
{
    //Descripcion de texturas intragranos
    $json_output = json_decode(getJSON($id_req), true);
    foreach ($json_output as $key) {
        if (!strcmp($key['key'], (string) $GLOBALS['xml']->metadata->desc_textures_intragranos)) {
            echo $key['value'];
        }
    }
}
function getJSON($id_req)
{
    set_time_limit(0);
    $client  = new http\Client;
    $request = new http\Client\Request;

    $request->setRequestUrl((string) $GLOBALS['xml']->request->request_url . '/items/' . $id_req . '/metadata');
    $request->setRequestMethod((string) $GLOBALS['xml']->request->request_method);
    $request->setHeaders(array(
        'postman-token' => (string) $GLOBALS['xml']->request->header_token, //Quizas hay que cambiarlo (?) No estoy seguro
        'cache-control' => (string) $GLOBALS['xml']->request->header_cache,
        'authorization' => (string) $GLOBALS['xml']->request->header_auth, //Se tendra que cambiar en cierto punto por la autorizacion de la cuenta (?)
    ));

    $client->enqueue($request)->send();
    $response = $client->getResponse();
    return $response->getBody();
}
