<?php
function getStatus($token)
{
    $client  = new http\Client;
    $request = new http\Client\Request;

    $request->setRequestUrl('http://mydspaceis.dis.eafit.edu.co/rest/status');
    $request->setRequestMethod('GET');
    $request->setHeaders(array(
        'rest-dspace-token' => $token,
        'accept'            => 'application/json',
        'content-type'      => 'application/json',
    ));

    $client->enqueue($request)->send();
    $response = $client->getResponse();

    return $response->getBody();
}
$auth = json_decode(getStatus($_POST['token']), true);
