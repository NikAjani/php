<?php

namespace Block\Category;

class Add extends \Block\Core\Template {

    protected $category = null;

    public function __construct() {
        $this->setTemplate("category/add.php");
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {

        $this->category = $category;

        return $this;
    }

    public function getParentCategory() {

        $category = new \Model\Category();

        return $this->getCategory()->fetchAll("SELECT `catId`, `name` FROM `{$category->getTableName()}` WHERE `parentId` = 0");
    }

    public function getStatusOptions() {
        return $this->getCategory()->getStatusName();
    }
}