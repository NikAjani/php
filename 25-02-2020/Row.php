<?php

use App\Model\Adapter;

require_once "Adapter.php";

class Row {

    protected $tableName = null;
    protected $primaryKey = null;
    protected $rowChanged = false;
    protected $data = [];

    public function __set($name, $value) {
        $this->setData([$name => $value]);
        return $this;
    }

    public function __get($name) {
        if($this->getData($name))
            return $this->getData($name);
        
        return null;
    }

    public function setData($data) {
        if(!is_array($data))
            throw new Exception("Data Must Be in Array");

        $this->data = array_merge($this->data, $data);
        $this->setRowChanged(true);
        return $this;
    }

    public function getData($name = "") {
        if($name != ""){
            return isset($this->data[$name]) ? $this->data[$name] : null;
        }
        return $this->data;
    }

    public function unsetData($name = "") {
        if($name != ""){
            unset($this->data[$name]);
            return $this;
        }
        $this->data = [];
        $this->setRowChanged(false);
        return $this;
    }

    public function setTableName($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function getTableName() {
        return $this->tableName;
    }

    public function setPrimaryKey($primaryKey) {
        $this->primaryKey = $primaryKey;
        return $this;
    }

    public function getPrimaryKey() {
        return $this->primaryKey;
    }

    public function setRowChanged($rowChanged) {
        $this->rowChanged = $rowChanged;
        return $this;
    }

    public function getRowsChanged() {
        return $this->rowChanged;
    }

    public function execute($query){
        $adapter = new Adapter();
        return $adapter->query($query);
    }

    public function insert() {

        if(!$this->getRowsChanged())
        throw new Exception("Provide Data For Insert Operation");
        
        $data = $this->getData();

        $colName = implode('`, `', array_keys($data));
        $colName = "`".$colName."`";

        $values = implode('\', \'', $data);
        $values = '\''.$values.'\'';

        echo $query = "INSERT INTO `".$this->getTableName()."` ($colName) VALUES ($values)";
        
        $adapter = new Adapter();

        if($adapter->query($query)){
            $this->unsetData();
            $this->setRowChanged(true);
            $this->load($adapter->getConnect()->insert_id);
            return true;
        }

        throw new Exception("Error in Data Insert");
    }

    public function delete() {

        if(!$this->getRowsChanged())
        throw new Exception("Provide Id For Delete Operation");

        $deleteId = $this->getData('id');
        $this->unsetData('id');

        echo $query = "DELETE FROM `".$this->getTableName()."` WHERE `".$this->getPrimaryKey()."` = '".$deleteId."'";

        if($this->execute($query)) {
            echo 'Deleted';
            return true;
        } else    
            throw new Exception("Error in Data Delete");
        
    }

    public function update() {

        if(!$this->getRowsChanged()){
            throw new Exception("Provide Id For Update Operation");
        }

        $editId = $this->getData('id');
        $this->unsetData('id');

        $data = $this->getData();
        $colName = array_keys($data);
        $colValues = array_values($data);

        $updateString = "`$colName[0]` = '$colValues[0]'";

        if(sizeof($colName) > 1) {
            for($i = 1; $i < sizeof($colName); $i++) {
                $updateString .= ", `$colName[$i]` = '$colValues[$i]'";
            }
        }

        echo $query = "UPDATE `".$this->getTableName()."` SET $updateString WHERE `".$this->getPrimaryKey()."` = '".$editId."'";
        if($this->execute($query)) {
            echo 'Updated';
            $this->load($editId);
            return true;
        } else
            throw new Exception("Error in Data Update");
    }

    public function load($id) {

        $query = "SELECT * FROM `".$this->getTableName()."` WHERE `".$this->primaryKey."` = '$id'";

        $result = $this->execute($query)->fetch_assoc();

        $this->unsetData();
        $this->setData($result);
    }

    public function fetchRow() {
        if(!$this->getRowsChanged())
            throw new Exception("Provice Id For Fetch Row");

        $tableName = $this->getTableName();
        $primaryKey = $this->getPrimaryKey();
        $fetchId = $this->getData('id');
        $this->unsetData('ID');
        
        $query = "SELECT * FROM `$tableName` WHERE `$primaryKey` = '$fetchId'";

        $result = $this->execute($query)->fetch_assoc();
        if($result)
            return $result;
        
        throw new Exception("Error In Fetch Row");
    }
    
}

$row = new Row();
echo '<pre>';
print_r($row);
$row->setTableName('product');
$row->setPrimaryKey('productId');
//$row->name = "Abc";
//$row->price = 12;
//$row->insert();
$row->id = 47;
$row->name = "Nikhil";
$row->price = 23;
//$row->delete();
//$row->update();
print_r($row->fetchRow());
print_r($row);

?>