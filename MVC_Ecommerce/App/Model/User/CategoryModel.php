<?php

namespace App\Model\User;

class CategoryModel extends \App\Model\Connection {

    function getCategory() {

        $colName = "CP.categoryName as parentCat, GROUP_CONCAT(C.categoryName) as childCat, GROUP_CONCAT(C.UrlKey) as childUrl";
        $table = ['category CP', 'category C'];
        $on = ['CP.catId = C.parentId'];

        return $this->join($colName, $table, 'INNER JOIN', $on, [], "GROUP BY CP.categoryName");
    }

    function getCategoryData($catName) {

        $catId = $this->fetchRow('catId', 'category', ['UrlKey' => $catName]);

        $table = ['product P', 'product_category PC', 'category C'];
        $on = ['P.productId = PC.productId', 'PC.catId = C.catId'];
        $where = ["C.catId = ".$catId[0]['catId']];

        return $this->join('P.productName, P.image,P.price, P.UrlKey', $table, 'INNER JOIN', $on, $where, "");

    }
}

?>