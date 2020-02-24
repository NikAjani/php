<?php

class Adapter {

    protected $config = ['host' => 'Localhost', 'userName' => 'root', 'password' => '', 'dbName' => 'mvc_ecommerce'];
    protected $connect;    

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

    function query($query) {
        //echo $query;
        if(!$this->isConnected())
            $this->connect();
        
        return $this->getConnect()->query($query);
    }

    function insert($query) {
        if($this->query($query)) {
            return $this->getConnect()->insert_id;
        }

        return null;
    }

    function update($query) {
        if($this->query($query)) {
            return true;
        }

        return false;
    }

    function delete($query) {
        if($this->query($query)) {
            return true;
        }
        return false;
    }

    function fetchAll($query) {
        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function fetchRow($query) {
        return $this->query($query)->fetch_all(MYSQLI_ASSOC)[0];
    }
    
    function fetchOne($query) {
        return $this->query($query)->fetch_all(MYSQLI_ASSOC)[0];
    }

    function fetchPairs($colNameArray, $tableName) {
        if(!is_array($colNameArray))
            throw new Exception("ColName must be in Array");
        
        $result = $this->query("SELECT `$colNameArray[0]`, `$colNameArray[1]` FROM `$tableName`")->fetch_all(MYSQLI_ASSOC);

        $resultpairs = [];

        /* foreach($result as $row) {
            $resultpairs = array_merge($resultpairs, [$row[$colNameArray[0]] => $row[$colNameArray[1]]]);
        } */
        
        $k=0;
        foreach($result as $row) {
            $resultpairs[$k] = $row[$colNameArray[1]];
            $k++;
        }

        print_r($resultpairs);
    }

}
/* 
$apadter = new Adapter();
$config = [
    'host' => 'Localhost', 
    'userName' => 'root', 
    'password' => '', 
    'dbName' => 'mvc_ecommerce'
];
echo '<pre>';
$apadter->setConfig($config)->connect();

//echo $apadter->insert("INSERT INTO `demo` (`firstName`, `lastName`) VALUES ('ABC', 'XYZ') ");
//echo $apadter->update("UPDATE `demo` SET `firstName` = '1234' WHERE `demoId` = '7'");
//print_r($apadter->fetchOne("SELECT count(`demoId`) FROM `demo`"));
//echo $apadter->delete("DELETE FROM `demo` WHERE `demoId` = '8'");

$apadter->fetchPairs(['demoId', 'firstName', 'lastName'], 'demo');
print_r($apadter); */

?>