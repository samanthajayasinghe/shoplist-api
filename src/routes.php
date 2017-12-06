<?php

use Slim\Http\Request;
use Slim\Http\Response;
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
        try{
            $deviceId = $request->getParam('deviceId');
            $data = $this->get('shopListService')->getList($deviceId);
            return $response->withJson($data);
        }catch (\Exception $e){
            $data = array('message'=>$e->getMessage());
            return $response->withJson($data, 400);
        }

    }
});

$app->post('/shoplist', function (Request $request, Response $response) {
    if($this->get('oauthservice')->verifyToken() ) {
        try{
            $deviceId = $request->getParam('deviceId');
            $items = $request->getParam('items');
            $shopDate = $request->getParam('date');
            $this->get('shopListService')->createList($deviceId, $shopDate, $items);
        }catch (\Exception $e){
            $data = array('message'=>$e->getMessage());
            return $response->withJson($data, 400);
        }
    }
});
