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

    public function getProduct() {

        $request = new \Model\Core\Request();

        $query = "SELECT  * 
        FROM `product` as P 
        INNER JOIN `product_category` as PC 
        ON PC.productId = P.productId 
        WHERE P.productId = {$request->getRequest('id')}";

        return $this->fetchRow($query);
    }


}