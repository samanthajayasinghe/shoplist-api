<?php

namespace ShopList\Mapper;

class DBMapper {

    private $config = null;

    private $db = null;


    private function getDB(){
        //if(empty($this->db)){
            $dsn      = 'mysql:dbname='.$this->getConfig()->dbName.';host='.$this->getConfig()->dbHost;

            $this->db = new \Pdo($dsn, $this->getConfig()->dbUser, $this->getConfig()->dbPassword);

            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        //}

        return $this->db;
    }

    public function executeQuery( $query, $params = array()){
        $query = $this->getDB()->prepare($query);
        $query->execute($params);
    }

    public function beginTransaction() {
        $this->getDB()->beginTransaction();
    }

    public function commit() {
        $this->getDB()->commit();
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
