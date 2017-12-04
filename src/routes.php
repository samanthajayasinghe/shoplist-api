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

//Headers should include Authorization : Bearer {tokenId}
$app->get('/shoplist', function (Request $request, Response $response) {
    if($this->get('oauthservice')->verifyToken() ) {
        $this->get('shopListService')->getList();
    }
});

$app->post('/shoplist', function (Request $request, Response $response) {
    if($this->get('oauthservice')->verifyToken() ) {
        $items = $request->getParam('items');
        $name = $request->getParam('name');
        $this->get('shopListService')->createList();
    }
});
