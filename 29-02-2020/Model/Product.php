<?php

namespace Model;


class Product extends \Model\Core\Row {

    public function __construct() {
        parent::__construct('product', 'productId');
    }

    public function getCategoryName() {
        
        $query = "SELECT `catId`, `name` 
        FROM `category` WHERE `parentId` != 0";

        return $this->fetchAll($query);
    }


}