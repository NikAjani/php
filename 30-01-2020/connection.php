<?php

$host = 'localhost';
$userName = 'root';
$password = '';
$database = 'customer_portal';

@$connection = new mysqli($host, $userName, $password, $database);

if($connection -> connect_error){

    die('Not Connected To DataBase');
}

function whereCondition($whereArray){
    $key = array_keys($whereArray);

    $where = '';
    $where .= "`".$key[0]."` = '".$whereArray[$key[0]]."'";
    
    for($i = 1; $i < sizeof($key); $i++){

        if(sizeof($key) > 1){
            $where .= " AND `".$key[$i]."` = '".$whereArray[$key[$i]]."'";
        } else {

        }
    }

    return $where;
}

function loadData($colName, $tableName, $whereArray){
    global $connection;

    $where = whereCondition($whereArray);

    $sqlQuery = "SELECT `".$colName."` FROM `".$tableName."` WHERE ".$where;
    $tableData = $connection -> query($sqlQuery);

    if($tableData -> num_rows > 0){
        $row = $tableData -> fetch_assoc();
        return $row[$colName];
    }

}

function fetchAllData($tableName){
    
    global $connection;

    $sqlQuery = "SELECT * FROM `".$tableName."`";
    $tableData = $connection -> query($sqlQuery);

    if($tableData -> num_rows > 0)
        return $tableData;
    else
        return ['Data Not Found'];

}

function fetchRow($tableName, $column, $whereArray){

    global $connection;

    $where = whereCondition($whereArray);

    $sqlQuery = "SELECT ".$column." FROM `".$tableName."` WHERE ".$where;
    $tableData = $connection -> query($sqlQuery);

    if($tableData -> num_rows > 0)
        return $tableData;
    else    
        return false;
}

function insertData($tableName, $colData){

    global $connection;

    $column = implode(',', array_keys($colData));
    $columnValue = implode('\',\'', array_values($colData));

    $sqlQuery = "INSERT INTO `$tableName` (".$column.") VALUES ('".$columnValue."')";

    if($connection -> query($sqlQuery) === TRUE){
        return $connection -> insert_id;
    } else  
        return false;
}

function viewData(){

    global $connection;

    $sqlQuery = "SELECT C.custId, C.firstName, CA.address1, CA.city, CO.fieldValue AS hobbies, CG.fieldValue AS getInTouch from `customers` C LEFT JOIN `customer_address` CA ON C.custId = CA.custId LEFT JOIN `customer_additional_info` CO ON C.custId = CO.custId LEFT JOIN `customer_additional_info` CG ON C.custId = CG.custId where CO.fieldKey = 'hobbies' AND CG.fieldKey = 'getInTouch'";

    $tableData = $connection -> query($sqlQuery);

    if($tableData -> num_rows > 0)
        return $tableData;
    else    
        return false;
}

function editDataQuery($id = 1){

    global $connection;

    $sqlQuery = "SELECT C.prefix, C.firstName, C.lastName, C.dateOfBirth, C.phoneNo, C.emailId,
    CA.address1, CA.address2, CA.company, CA.city, CA.state, CA.country, CA.postalCode, 
    DS.fieldValue AS describeYourSelf,
    E.fieldValue AS experience,
    CS.fieldValue AS clientSee,
    GT.fieldValue AS getInTouch,
    HB.fieldValue AS hobbies,
    PP.fieldValue AS profileImage,
    CP.fieldValue AS certificateFile 
    FROM customers AS C 
    LEFT JOIN customer_address AS CA ON C.custId = CA.custId 
    LEFT JOIN customer_additional_info DS ON C.custId = DS.custId 
    LEFT JOIN customer_additional_info E ON C.custId = E.custId 
    LEFT JOIN customer_additional_info CS ON C.custId = CS.custId 
    LEFT JOIN customer_additional_info GT ON C.custId = GT.custId 
    LEFT JOIN customer_additional_info HB ON C.custId = HB.custId 
    LEFT JOIN customer_additional_info PP ON C.custId = PP.custId 
    LEFT JOIN customer_additional_info CP ON C.custId = CP.custId 
    where DS.fieldKey = 'describeYourSelf' AND E.fieldKey = 'experience' AND CS.fieldKey = 'clientSee' AND GT.fieldKey = 'getInTouch' AND HB.fieldKey = 'hobbies' AND PP.fieldKey = 'profileImagePath' AND CP.fieldKey = 'certificateFile' AND C.custId = "."'".$id."'";

    $tableData = $connection -> query($sqlQuery);

    return $tableData;


}

function updateData($updateData, $tableName, $whereArray) {

    global $connection;
    
    $colName = array_keys($updateData);
    $colValue = array_values($updateData);

    $updateString = "";

    $updateString .= $colName[0].' = \''.$colValue[0].'\'';

    if(sizeof($colName) > 1) {

        for($i = 1; $i < sizeof($colName); $i++){
            $updateString .= ', '.$colName[$i].' = \''.$colValue[$i].'\'';
        }

    }

    $updateString;

    $where = whereCondition($whereArray);

    $sqlQuery = "UPDATE `$tableName` SET ".$updateString." WHERE ".$where;

    if($connection -> query($sqlQuery) === TRUE)
        return true;
    else{
        echo mysqli_error($connection);    
        return false;
    }
}

function deleteRow($tableName, $whereArray){

    global $connection;

    $where = whereCondition($whereArray);

    echo $sqlQuery = "DELETE FROM `$tableName` WHERE ".$where;

    if($connection -> query($sqlQuery) === TRUE){
        echo mysqli_error($connection);
        return true;
    } else {
        return false;
    }

}

?>
