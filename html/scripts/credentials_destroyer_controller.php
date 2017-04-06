<?php

function getJSONLogout($token){
    $client  = new http\Client;
    $request = new http\Client\Request;

    $request->setRequestUrl('http://mydspaceis.dis.eafit.edu.co/rest/logout');
    $request->setRequestMethod('POST');
    $request->setHeaders(array(
        'content-type'  => 'application/json',
        'rest-dspace-token' => ''.$token.''
    ));

    $client->enqueue($request)->send();
    $response = $client->getResponse();
    return $response;
}

echo getJSONLogout($_POST['token']);
