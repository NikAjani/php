<?php

namespace Model\Product;

class Image extends \Model\Core\Row {

    public function __construct() {
        parent::__construct('product_image', 'imageId');
    }
}