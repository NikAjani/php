<?php

namespace App\Model\User;

class SearchModel extends \App\Model\Connection {

    function getSearchResult($srchName) {

        if($category = $this->fetchRow('UrlKey', 'category', [], 'Where UrlKey LIKE "%'.$srchName.'%"')) {

            //print_r($category);
            return ['category', $category[0]['UrlKey']];
        } else {
            $srchName = str_replace("-", " ", $srchName);
            if($product = $this->fetchRow('*', 'product', [], 'Where description LIKE "%'.$srchName.'%"')){
                return $product;
            } else 
                return false;
        }
    }
}

?>