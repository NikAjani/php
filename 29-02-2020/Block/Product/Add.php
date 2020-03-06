<?php

namespace Block\Product;

class Add extends \Block\Core\Template {

	protected $product = null;

	function __construct()
	{
		$this->setTemplate("product/add.php");
		$this->setProduct();
	}

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product = null)
    {
    	if($product == null) 
    		$product = new \Model\Product();

        $this->product = $product;

        return $this;
    }
}