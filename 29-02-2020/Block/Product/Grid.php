<?php

namespace Block\Product;

class Grid extends \Block\Core\Template {

	protected $products = null;

	function __construct()
	{
		$this->setTemplate("product/grid.php");
		$this->setProducts();
	}

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products = null)
    {
    	if($products == null) {

    		$products = new \Model\Product();
    		$products = $products->fetchAll();
    	}
        $this->products = $products;

        return $this;
    }
}