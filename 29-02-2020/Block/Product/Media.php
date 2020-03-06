<?php

namespace Block\Product;

class Media extends \Block\Core\Template {

	protected $product = null;
	protected $productImages = null;

	function __construct()
	{
		$this->setTemplate('product/media.php');
		$this->setProductImages();
	}

    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProductImages($productImages = null)
    {
        $this->productImages = $productImages;

        return $this;
    }

    public function getProductImages()
    {
        return $this->productImages;
    }
}