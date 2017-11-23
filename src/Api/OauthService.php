<?php

namespace ShopList\Api;

use OAuth2\Storage\Pdo;

class OauthService {

    private $config = null;

    public function __construct(\stdClass $config) {
        $this->config = $config;
    }

    public function getStorage() {
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
