<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/token', function (Request $request, Response $response) {
    $oauthservice = $this->get('oauthservice');
    $oauthservice->getStorage();
    return $response->withJson(['foo' => 'das'], 200);
});
