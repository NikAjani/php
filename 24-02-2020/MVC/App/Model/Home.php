<?php

namespace App\Model;
use \App\Model\Adapter as Adapter;

class Home {

    function getAllCategory() {

        $adapter = new Adapter();

        return $adapter->fetchAll("SELECT * FROM `category`");
    }

    function getRow($id) {
        $adapter = new Adapter();

        return $adapter->fetchRow("SELECT * FROM `category` WHERE `catId` = '$id'");
    }

    function getCategoryName() {
        $adapter = new Adapter();

        return $adapter->fetchAll("SELECT `catId`, `categoryName` FROM `category` WHERE `parentId` = '0'");
    }

    function addUser($insertData) {
        $insertData = $this->preparedData($insertData);
        print_r($insertData);
        $adapter = new Adapter();
        
        echo $query = "INSERT INTO `category` (`categoryName`, `UrlKey`, `image`, `status`, `description`) VALUES ('".$insertData['categoryName']."', '".$insertData['UrlKey']."', '".$insertData[1]."', '".$insertData['status']."', '".$insertData['description']."')";
        
        if($adapter->insert($query))
            return true;
        
        return false;
    
    }

    function preparedData($data) {
        $preaparedData = [];

        $preaparedData = array_merge($preaparedData, ['categoryName' => $data['categoryName']]);
        $preaparedData = array_merge($preaparedData, ['UrlKey' => str_replace(' ', '-', $data['categoryName'])]);
        $preaparedData = array_merge($preaparedData, ['image', $_FILES['image']['name']]);
        $status = $data['status'] == 1 ? "yes" : "No";
        $preaparedData = array_merge($preaparedData, ['status' => $status]);
        $preaparedData = array_merge($preaparedData, ['description' => $data['description']]);

        return $preaparedData;

    }
}

?>