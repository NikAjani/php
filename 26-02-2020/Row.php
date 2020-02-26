<?php

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
        return $this->getData($name);
    }

    public function setData($data) {

        if(!is_array($data))
            throw new Exception("Data Must be in Array");
        
        $this->data = array_merge($this->data, $data);
        $this->setRowChanged(true);
        return $this;
    }

    public function getData($name = "") {

        if($name != "")
            return $this->data[$name];
        
        return $this->data;
    }

    public function unsetData($name = "") {

        if($name != "") {
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

    public function getRowChanged() {
        return $this->rowChanged;
    }

    public function execute($query) {

        $adapter = new Adapter();
        return $adapter->query($query);
    }

    public function load($id) {

        $this->unsetData();

        $query = "SELECT * FROM `".$this->getTableName()."` WHERE `".$this->getPrimaryKey()."` = '$id'";

        $result = $this->execute($query)->fetch_assoc();

        return $this->setData($result);
    }

    public function insert() {

        if(!$this->getRowChanged())
            throw new Exception("Provide Insert Data");

        $data = $this->getData();

        $colName = implode("`, `", array_keys($data));
        $colName = "`".$colName."`";

        $colValues = implode("', '", array_values($data));
        $colValues = "'".$colValues."'";

        $query = "INSERT INTO `".$this->getTableName()."` ($colName) VALUES ($colValues)";

        $adapter = new Adapter();

        if($adapter->query($query)) {
            $this->load($adapter->getConnect()->insert_id);
            return true;
        }

        return false;
    }

    public function update() {

        if(!$this->getRowChanged())
            throw new Exception("Provide Updated Data");
        
        $editId = $this->getData('id');
        $this->unsetData('id');
        $data = $this->getData();
        $colName = array_keys($data);
        $colValues = array_values($data);

        $updateString =  "`$colName[0]` = '$colValues[0]'";

        for($i = 1; $i < sizeof($colName); $i++) {
            $updateString .= ", `$colName[$i]` = '$colValues[$i]'";
        }

        $query = "UPDATE `".$this->getTableName()."` SET $updateString WHERE `".$this->getPrimaryKey()."` = '$editId'";

        if($this->execute($query))
            return true;
        
        return false;

    }

    public function delete() {

        if(!$this->getRowChanged())
            throw new Exception("Provide Id For Delete Recored");
        
        $delId = $this->getData('id');
        $this->unsetData('id');

        $query = "DELETE FROM `".$this->getTableName()."` WHERE `".$this->getPrimaryKey()."` = '$delId'";

        if($this->execute($query))
            return true;
        
        return false;
    }

    public function fetchRow() {

        if(!$this->getRowChanged())
            throw new Exception("Provide Id For Fetch Row");
        
        $fetchId = $this->getData('id');
        $this->unsetData('id');

        $query = "SELECT * FROM `".$this->getTableName()."` WHERE `".$this->getPrimaryKey()."` = '$fetchId'";

        if($result = $this->execute($query))
            return $result->fetch_assoc();
        
        return null;

    }

}

$row = new Row();

echo '<pre>';
$row->setTableName('product');
$row->setPrimaryKey('productId');
// $row->name = "ProductName";
// $row->price = 20;
// $row->UrlKey = "ProductName";
// $row->insert();
$row->id = 50;
//print_r($row->fetchRow());
//$row->delete();
$row->name = "Product123";
$row->update();
print_r($row)

?>