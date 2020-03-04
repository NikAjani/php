<?php

namespace App\Model;

use PDO;

class Connection {

    public function __construct() {

        $host = "mysql:host=".\App\config::HOST.";dbname=".\APP\config::DBNAME;
        
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

    function join($colName, $table, $joinType, $On , $whereArray = [], $other = "") {

        $join = $this->prepareJoin($table, $joinType, $On, $whereArray);

        $sqlQuery = "SELECT $colName FROM $join[0] $join[1] $other";

        $stmt = $this->connection->query($sqlQuery);
        
        if($tableData = $stmt->fetchAll(PDO::FETCH_ASSOC))
            return $tableData;
        else    
            return false;
        
    }

    protected function prepareJoin($table, $joinType, $On, $whereArray) {

        $tableString = " $table[0] $joinType $table[1] ON $On[0] ";

        if(sizeof($table) > 2) {
           
            for($i = 2; $i < sizeof($table); $i++) {

                $tableString .= $joinType ." ". $table[$i] . " ON " . $On[$i - 1];
            }
        }

        $whereCondition = "";

        if(sizeof($whereArray) >= 1) { 

            $whereCondition = " WHERE " . $whereArray[0];

            if(sizeof($whereArray) > 1) {

                for($i = 1; $i < sizeof($whereArray); $i++) {

                    $whereCondition .= " AND ". $whereArray[$i];
                }
            }
        }

        return [$tableString, $whereCondition];

    }

    protected function whereCondition($whereArray) {

        if(sizeof($whereArray) >= 1) {
            $where = "";
            $key = array_keys($whereArray);
            $value = array_values($whereArray);
            $where = " WHERE ".$key[0]."='".$value[0]."'";

            if(sizeof($whereArray) > 1) {
                for($cnt = 1; $cnt < sizeof($whereArray); $cnt++) {
                    if($key[$cnt] == 'password')
                        $where .= ' AND '.$key[$cnt]." = '".md5($value[$cnt])."'";
                    else    
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