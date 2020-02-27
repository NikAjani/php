<?php

require_once "Adapter.php";

class Row {

    protected $tableName = null;
    protected $primaryKey = null;
    protected $rowChanged = false;
    protected $data = [];
    protected $adapter = null;

    public function __construct($tableName = 'product', $primaryKey = 'productId') {
        $this->setTableName($tableName);
        $this->setPrimaryKey($primaryKey);
        $this->setAdapter();
    }

    public function __set($name, $value) {
        return $this->setData([$name => $value]);
    }

    public function __get($name) {
        return $this->getData($name);
    }

    public function setData($data) {
        if(!is_array($data))
            throw new Exception("Data Must Be in Array");
        
        $this->data = array_merge($this->data, $data);
        $this->setRowChanged(true);
        return $this;
    }

    public function getData($name = null) {
        
        if($name == null)
            return $this->data;

        return $this->data[$name];
    }

    public function unsetData($name = null) {

        if($name == null){
            $this->data = [];
            $this->setRowChanged(false);
            return $this;
        }

        unset($this->data[$name]);
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

    public function setAdapter($adapter = null) {
        if($adapter == null) {
            $adapter = new Adapter();
            $this->adapter = $adapter;
            return $this;
        }

        $this->adapter = $adapter;
        return $this;
    }

    public function getAdapter() {
        return $this->adapter;
    }

    public function load($id) {

        $query = "SELECT * 
        FROM `{$this->getTableName()}` 
        WHERE `{$this->getPrimaryKey()}` = '{$id}';";

        return $this->fetchRow($query);
    }

    public function insert() {
            
        $data = $this->getData();
        $colName = "`".implode("`, `", array_keys($data)). "`";

        $colValues = (array_map(function ($colValue) {

            return addslashes($colValue);
        }, array_values($data)));
        
        $colValues = "'".implode("', '", $colValues)."'";
        
        echo $query = "INSERT 
        INTO `{$this->getTableName()}` ({$colName}) 
        VALUES ({$colValues});";

        return $this->load($this->getAdapter()->insert($query));

    }

    public function update() {

        $editId = $this->getData($this->getPrimaryKey());
        $this->unsetData($this->getPrimaryKey());
        $data = $this->getData();
        $colName = array_keys($data);

        $colValues = (array_map(function ($colValue) {

            return addslashes($colValue);
        }, array_values($data)));

        $updateString = "`{$colName[0]}` = '{$colValues[0]}'";

        for($i = 1; $i < sizeof($colName); $i++) {
            $updateString .= ", `{$colName[$i]}` = '{$colValues[$i]}'";
        }

        echo $query = "UPDATE `{$this->getTableName()}` 
        SET {$updateString} 
        WHERE `{$this->getPrimaryKey()}` = '{$editId}'";

        return $this->getAdapter()->update($query);

    }

    public function delete() {

        if($this->getRowChanged() == false)
            throw new Exception("Provide Id For Delete Recored");

        $delId = $this->getData($this->getPrimaryKey());
        $this->unsetData($this->getPrimaryKey());

        $query = "DELETE 
        FROM `{$this->getTableName()}` 
        WHERE `{$this->getPrimaryKey()}` = '{$delId}';";

        return $this->getAdapter()->delete($query);
    }

    public function fetchRow($query) {
        
        $this->unsetData();
        
        $row = $this->getAdapter()->fetchRow($query);
        $this->setData($row);
        $this->setRowChanged(false);
        
        return $this;
    }

    public function fetchAll() {

        $query = "SELECT * 
        FROM `{$this->getTableName()}`;";

        $rows = $this->getAdapter()->fetchAll($query);

        if($rows == null)
            return null;

        foreach($rows as $key => &$row) 
            $row = (new $this())->setData($row);

        return $rows;
    }
}

?>