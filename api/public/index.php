<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->post('/', function (Request $request, Response $response) {
	$name = $request->getAttribute('userName');
    $response->getBody()->write("Hello, $name");

    // return $response->withAddedHeader("Access-Control-Allow-Origin", "*");
    return $response;
});
$app->run();