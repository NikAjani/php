<?php

namespace Block\Product;

class Add extends \Block\Core\Template {

	protected $product = null;
    
	function __construct() {
    
		$this->setTemplate("product/add.php");
	}

    public function getProduct() {
        return $this->product;
    }
    
    public function setProduct($product) {

        $this->product = $product;

        return $this;
    }
}