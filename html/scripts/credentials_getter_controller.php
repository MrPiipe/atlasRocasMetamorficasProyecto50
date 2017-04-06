<?php

function getJSONLogin($user, $pass)
{
    $client  = new http\Client;
    $request = new http\Client\Request;
    $body    = new http\Message\Body;
    $body->append('{"email":"' . $user . '","password":"' . $pass . '"}');

    $request->setRequestUrl('http://mydspaceis.dis.eafit.edu.co/rest/login');
    $request->setRequestMethod('POST');
    $request->setBody($body);
    $request->setHeaders(array(
        'content-type'  => 'application/json',
    ));

    $client->enqueue($request)->send();
    $response = $client->getResponse();
    return $response->getBody();
}

echo getJSONLogin($_POST['user'], $_POST['pass']);
