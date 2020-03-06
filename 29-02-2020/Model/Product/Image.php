<?php

namespace Model\Product;

class Image extends \Model\Core\Row {

    protected $imageDir = null;

    public function __construct() {
        parent::__construct('product_image', 'imageId');
        $this->setImageDir('media\catalog\product\\');
    }

    public function setImageDir($path = null) {
        
        if($path == null)
            $this->imageDir = \Ccc::getBaseDirectory();

            $this->imageDir = \Ccc::getBaseDirectory($path);
    }

    public function getImageDir() {
        return $this->imageDir;
    }
}