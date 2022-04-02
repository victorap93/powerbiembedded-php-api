<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;

// Power BI Embedded
use victorap93\PowerBIEmbedded\MSToken;
use victorap93\PowerBIEmbedded\EmbeddedToken;

require './../vendor/autoload.php';

// Initiate $_ENV values.
$dotenv = Dotenv\Dotenv::createImmutable('./../');
$dotenv->load();

$app = AppFactory::create();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->post('/getToken', function (Request $request, Response $response, array $args) {

    $params = json_decode($request->getBody()->getContents(), true);

    $MSToken = new MSToken;
    $ms_token = $MSToken->getMSTokenBySecret($_ENV['TENANT_ID'], $_ENV['CLIENT_ID'], $_ENV['CLIENT_SECRET']);

    $EmbeddedToken = new EmbeddedToken;
    $embedded_token = $EmbeddedToken->getEmbeddedToken($_ENV['WORKSPACE_ID'], $params['report_id'], $ms_token->access_token, $params['params']);

    $response->getBody()->write(json_encode($embedded_token));
    return $response
        ->withHeader('Content-Type', 'application/json');
});

/**
 * Catch-all route to serve a 404 Not Found page if none of the routes match
 * NOTE: make sure this route is defined last
 */
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});


$app->run();
