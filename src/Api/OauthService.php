<?php

namespace ShopList\Api;

use OAuth2\Storage\Pdo;
use OAuth2\Server;
use OAuth2\GrantType\ClientCredentials;
use OAuth2\GrantType\AuthorizationCode;
use OAuth2\Request;

class OauthService {

    private $config = null;
    private $oAuthServer = null;

    public function __construct(\stdClass $config) {
        $this->config = $config;
        $this->initServer();
    }

    /**
     * Verify the token
     */
    public function verifyToken() {
        if (!$this->oAuthServer->verifyResourceRequest(Request::createFromGlobals())) {
            $this->oAuthServer->getResponse()->send();
            return false;
        }
        return true;
    }

    /**
     * Get Token
     */
    public function getToken() {
        return $this->oAuthServer->handleTokenRequest(Request::createFromGlobals())->send();
    }

    private function initServer() {
        $storage = $this->getStorage();
        $this->oAuthServer = new Server($storage);
        $this->oAuthServer->addGrantType(new ClientCredentials($storage));
        $this->oAuthServer->addGrantType(new AuthorizationCode($storage));
    }

    private function getStorage() {
        $dsn      = 'mysql:dbname='.$this->config->dbName.';host='.$this->config->dbHost;

        return new Pdo(
            array(
            'dsn' => $dsn,
            'username' => $this->config->dbUser,
            'password' => $this->config->dbPassword
            )
        );
    }
}
