<?php

require_once 'Core/Row.php';

class CategoryModel extends Row {

    public function __construct() {
        parent::__construct('category', 'catId');
    }

    public function deleteCategory() {
        print_r($this->getData());
        $query = "SELECT `catId` 
        FROM `{$this->getTableName()}` 
        WHERE `parentId` = '{$this->getData('catId')}';";

        $ids = $this->getAdapter()->fetchAll($query);
        // $this->delete();
        if($ids != []) {
            foreach($ids as $value) {
                $this->catId = $value['catId'];
                if(!$this->delete()) 
                    throw new Exception("Error Delete Category");
            }
            return true;
        }
        
        return $this->delete();


        print_r($ids);
    }

}