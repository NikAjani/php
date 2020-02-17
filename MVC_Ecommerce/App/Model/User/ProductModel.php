<?php

namespace App\Model\User;

class ProductModel extends \App\Model\Connection {

    function getRow() {

        return $this->fetchRow('categoryName', 'category', ['parentId' => 0]);
    }
}

?>