<?php

namespace Model;

use Model\Core\Row;

class ProductModel extends Row {

    public function __construct() {
        parent::__construct('product', 'productId');
    }


}