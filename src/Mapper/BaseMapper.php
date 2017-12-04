<?php

namespace ShopList\Mapper;

class BaseMapper {

    private $config = null;

    private $db = null;

    /**
     * @param $query
     */
    public function executeQuery($query) {

    }

    private function getDB(){
        if(!empty($this->db)){
            $dsn      = 'mysql:dbname='.$this->getConfig()->dbName.';host='.$this->getConfig()->dbHost;

            $this->db = new Pdo(
                array(
                    'dsn' => $dsn,
                    'username' => $this->getConfig()->dbUser,
                    'password' => $this->getConfig()->dbPassword
                )
            );
        }

        return $this->db;
    }

    /**
     * @return null
     */
    public function getConfig() {
        return $this->config;
    }

    /**
     * @param null $config
     */
    public function setConfig($config) {
        $this->config = $config;
    }


}
