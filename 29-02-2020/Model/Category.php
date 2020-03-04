<?php

namespace Model;

class Category extends \Model\Core\Row {

    protected const INACTIVE = 0;
    protected const ACTIVE = 1;
    protected const INACTIVE_LABEL = "InActive";
    protected const ACTIVE_LABEL = "Active";

    public function __construct() {
        parent::__construct('category', 'catId');
    }

    public function getStatusName() {
        return [self::INACTIVE => self::INACTIVE_LABEL, self::ACTIVE => self::ACTIVE_LABEL];
    }

    public function deleteCategory() {
    
        $query = "SELECT `catId` 
        FROM `{$this->getTableName()}` 
        WHERE `parentId` = '{$this->getData('catId')}';";

        $ids = $this->getAdapter()->fetchAll($query);

        if($ids == [])
            return $this->delete();
            
        $this->delete();
        foreach($ids as $value) {
            $this->catId = $value['catId'];
            if(!$this->delete()) 
                throw new \Exception("Error Delete Child Category");
        }
        return true;
    }

}