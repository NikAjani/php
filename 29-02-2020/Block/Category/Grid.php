<?php

namespace Block\Category;

class Grid extends \Block\Core\Template {

    protected $categories = null;

    public function __construct(){
        $this->setTemplate("category/grid.php");
        $this->setCategories();   
    }

    public function getCategories()
    {
        return $this->categories;
    }
 
    public function setCategories($categories = null)
    {
        if($categories == null) {

            $categories = new \Model\Category();
            $categories = $categories->fetchAll();
        }

        $this->categories = $categories;

        return $this;
    }
}