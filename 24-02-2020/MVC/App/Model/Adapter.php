<?php

namespace App\Model;
use mysqli;
use Exception;

class Adapter {

    protected $config = ['host' => 'Localhost', 'userName' => 'root', 'password' => '', 'dbName' => 'mvc_ecommerce'];
    protected $connect;
    protected $query;    

    public function setConfig($config) {
        if(!is_array($config))
            throw new Exception("Config Variable Must be Array");

        $this->config = array_merge($this->config, $config);
        return $this;
    }

    public function getConfig() {
        return $this->config;
    }

    public function setConnect($connect) {
        $this->connect = $connect;
        return $this;
    }

    public function getConnect() {
        return $this->connect;
    }

    public function setQuery($query) {
        $this->query = $query;
        return $this;
    }

    public function getQuery() {
        return $this->query;
    }

    function connect() {

        $config = $this->getConfig();
        $connect = new mysqli($config['host'], $config['userName'], $config['password'], $config['dbName']);
        $this->setConnect($connect);
    }

    function isConnected() {
        if(!$this->getConnect())
            return false;
        return true;
    }

    function query() {
        
        if(!$this->isConnected())
            $this->connect();
        
        return $this->getConnect()->query($this->getQuery());
    }

    function insert($query) {
        $this->setQuery($query);
        if($this->query()) {
            return $this->getConnect()->insert_id;
        }

        return null;
    }

    function update($query) {
        $this->setQuery($query);
        if($this->query()) {
            return true;
        }

        return false;
    }

    function delete($query) {
        $this->setQuery($query);
        if($this->query()) {
            return true;
        }
        return false;
    }

    function fetchAll($query) {
        $this->setQuery($query);
        return $this->query()->fetch_all(MYSQLI_ASSOC);
    }

    function fetchRow($query) {
        $this->setQuery($query);
        return $this->query()->fetch_all(MYSQLI_ASSOC)[0];
    }

    function fetchOne($query) {
        $this->setQuery($query);
        return $this->query()->fetch_all(MYSQLI_ASSOC)[0];
    }

    function fetchPairs($colNameArray, $tableName) {
        if(!is_array($colNameArray))
            throw new Exception("ColName must be in Array");
        
        $colNameArray[1] = (isset($colNameArray[1])) ? $colNameArray[1] : null;

        $this->setQuery("SELECT `$colNameArray[0]`, `$colNameArray[1]` FROM `$tableName`");
        
        $result = $this->query()->fetch_all(MYSQLI_ASSOC);

        $resultpairs = [];
        
        $resultpairs = array_column($result, $colNameArray[1], $colNameArray[0]);
    
        print_r($resultpairs);

        return $resultpairs;
    }

}

?>