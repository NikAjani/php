<?php

namespace Model;

class ProductCategory extends \Model\Core\Row {

    public function __construct() {
        parent::__construct('product_category', 'id');
    }
}