<?php

class Adapter {

    protected $config = ['host' => 'Localhost', 'userName' => 'root', 'password' => '', 'dbName' => 'practice'];
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
        
        return $this->setConnect($connect);
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
        $collection = $this->query()->fetch_all(MYSQLI_ASSOC);
        
        if($collection)
            return $collection;
        
        return null;
    }

    function fetchRow($query) {
        $this->setQuery($query);
        $row = $this->query()->fetch_assoc();

        if($row)
            return $row;

        return null;
    }

}

?>