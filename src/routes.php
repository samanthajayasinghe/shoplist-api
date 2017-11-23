<?php

use Slim\Http\Request;
use Slim\Http\Response;
use ShopList\Api\ShopListService;
// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->post('/token', function (Request $request, Response $response) {
    $oauthservice = $this->get('oauthservice');
    $oauthservice->getToken();
});

$app->get('/shoplist', function (Request $request, Response $response) {
    $oauthservice = $this->get('oauthservice');
    $shopListService = new ShopListService($oauthservice);
});
