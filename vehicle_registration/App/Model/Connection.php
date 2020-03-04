<?php

namespace App\Model;
use App\config as Config;
use PDO;
abstract class Connection {

    public function __construct() {

        $host = "mysql:host=".Config::HOST.";dbname=".Config::DBNAME;
        
        $this->connection = new PDO($host, \App\config::USERNAME, \App\config::PASSWORD);

        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }

    protected function getAll($tableName) {
        
        $sqlQuery = "SELECT * FROM `$tableName`";
        $stmt = $this->connection->query($sqlQuery);
        
        if($result = $stmt->fetchAll(PDO::FETCH_ASSOC))
            return $result;
        else 
            return false;
    }

    protected function fetchRow($colName, $tableName, $whereArray = [], $other='') {

        $where = $this->whereCondition($whereArray);

        $sqlQuery = "SELECT $colName FROM `$tableName`".$where. $other;
        $stmt = $this->connection->query($sqlQuery);
        
        if($tableData = $stmt->fetchAll(PDO::FETCH_ASSOC))
            return $tableData;
        else    
            return false;

    }

    protected function insertData($tableName, $colData) {

        $column = implode(', ', array_keys($colData));
        $columnValue = implode('\', \'', array_values($colData));

        $sqlQuery = "INSERT INTO `$tableName` (".$column.") VALUES ('".$columnValue."')";

        if($this->connection->exec($sqlQuery))
            return $this->connection->lastInsertId();
        else
            return false;
        
    }

    protected function update($updateData, $tableName, $whereArray = []) {
        
        $colName = array_keys($updateData);
        $colValue = array_values($updateData);
    
        $updateString = "";
    
        $updateString .= $colName[0].' = \''.$colValue[0].'\'';
    
        if(sizeof($colName) > 1) {
    
            for($i = 1; $i < sizeof($colName); $i++){
                $updateString .= ', '.$colName[$i].' = \''.$colValue[$i].'\'';
            }
    
        }
    
        $where = $this->whereCondition($whereArray);

        $sqlQuery = "UPDATE `$tableName` SET ".$updateString."".$where;
    
        if($this->connection->exec($sqlQuery))
            return true;
        else
            return false;
    }

    protected function deleteRow($tableName, $whereArray= []) {
    
        $where = $this->whereCondition($whereArray);
    
        $sqlQuery = "DELETE FROM `$tableName` ".$where;
    
        if($this->connection->exec($sqlQuery))
            return true;
        else
            return false;
    
    }

    protected function whereCondition($whereArray) {

        if(sizeof($whereArray) >= 1) {
            $where = "";
            $key = array_keys($whereArray);
            $value = array_values($whereArray);
            $where = " WHERE ".$key[0]."='".$value[0]."'";

            if(sizeof($whereArray) > 1) {
                for($cnt = 1; $cnt < sizeof($whereArray); $cnt++) {    
                        $where .= ' AND '.$key[$cnt]." = '".$value[$cnt]."'";
                }
            }
        } else {
            $where = "";
        }

        return $where;
    }

    function __destruct() {
        
        $this->connection = null;
    }

}

?>