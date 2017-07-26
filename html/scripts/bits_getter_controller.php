<?php
$xml = simplexml_load_file(dirname(__FILE__).'/getter_config.xml');
function getBitstreamIdOrig($id_req){
    $json_output = json_decode(getJSONbits($id_req), true);
    $img         = array();
    foreach ($json_output as $key) {
        if (!strcmp($key['bundleName'], (string) $GLOBALS['xml']->request->bundleNameO)) {
            $img[] = $key['id'];
        }
    }
    return $img;
}
function getBitstreamIdThumb($id_req){
    $json_output = json_decode(getJSONbits($id_req), true);
    $img         = array();
    foreach ($json_output as $key) {
        if (!strcmp($key['bundleName'], (string) $GLOBALS['xml']->request->bundleNameThumb)) {
            $img[] = $key['id'];
            return $img;
        }
    }
    return $img;
}
function getBitstreamImg($id_req, $i){
    $linkStr = "../images/rockImages/" . $id_req . ".jpg";
    $imgStr = "../images/resizedImages/" . $id_req . ".jpg";
    return ('<a href="'.$linkStr.'"> <img style="left: -25px;" src="' . $imgStr . '"/></a>');
}

function getBitstreamThumb($id_req){
    if ($id_req==0) {
        return ('<img id="thumbnailImg" src="../images/roca.png"/>');
    }
    $imgStr = "http://mydspaceis.dis.eafit.edu.co/rest/bitstreams/" . $id_req . "/retrieve";
    return ('<img id="thumbnailImg" src="' . $imgStr . '"/>');
}
function getBitstreamThumbUrl($id_req){
    $imgStr = "http://mydspaceis.dis.eafit.edu.co/rest/bitstreams/" . $id_req . "/retrieve";
    return $imgStr;
}
function getJSONbits($id_req){
    set_time_limit(0);
    $client  = new http\Client;
    $request = new http\Client\Request;
    $request->setRequestUrl((string) $GLOBALS['xml']->request->request_url . '/items/' . $id_req . '/bitstreams');
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
