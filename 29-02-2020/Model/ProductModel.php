<?php

require_once 'Core/Row.php';

class ProductModel extends Row {

    public function __construct() {
        parent::__construct('product', 'productId');
    }

}