<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

function callAPI($url, $data)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

$app = new \Slim\App;
$app->post('/', function (Request $request, Response $response) {
	$name = $request->getAttribute('userName');
    $response->getBody()->write("Hello, $name");
    callAPI('url', array('userName' => $name));
    return $response->withAddedHeader("Access-Control-Allow-Origin", "*");
});
$app->run();