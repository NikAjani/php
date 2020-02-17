<?php

namespace App\Model\User;

class ProductModel extends \App\Model\Connection {

    function getProduct($urlKey) {

        return $this->fetchRow('*', 'product', ['UrlKey' => $urlKey]);
    }
}

?>