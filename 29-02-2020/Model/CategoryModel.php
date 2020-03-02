<?php

namespace Model;

use Exception;
use Model\Core\Row;

class CategoryModel extends Row {

    public function __construct() {
        parent::__construct('category', 'catId');
    }

    public function deleteCategory() {
    
        $query = "SELECT `catId` 
        FROM `{$this->getTableName()}` 
        WHERE `parentId` = '{$this->getData('catId')}';";

        $ids = $this->getAdapter()->fetchAll($query);
        
        if($ids != []) {
            $this->delete();
            foreach($ids as $value) {
                $this->catId = $value['catId'];
                if(!$this->delete()) 
                    throw new Exception("Error Delete Category");
            }
            return true;
        }
        
        return $this->delete();
    }

}